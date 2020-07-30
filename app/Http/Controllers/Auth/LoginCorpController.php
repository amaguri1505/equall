<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\EstateAgent;

class LoginCorpController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME_CORP;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_corp_guest')->except('logout');
    }

    public function index() {
        return view('meta-corp');
    }

    protected function guard()
    {
        return auth()->guard('sanctum_corp');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $corp = EstateAgent::where('email', $request->email)->first();

        if (!$corp || !Hash::check($request->password, $corp->password)) {
            return response()->json('Not Matched');
        } else {
            if ($this->guard()->login($corp)) {
                return response()->json('complete');
            }
            return response()->json('login error');
        }

    }

}
