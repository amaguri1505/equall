<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// 追加
use Illuminate\Auth\AuthManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';
    private $authManager;

    public function __construct(AuthManager $authManager)
    {
        $this->authManager = $authManager;
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request): JsonResponse
    {
        $guard = $this->authManager->guard('api');
        $token = $guard->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);
        if (!$token) {
            return new JsonResponse(__('auth.failed'));
        }
        return new JsonResponse($token);
    }
}
