<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VerificationCorpController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        $corp = auth()->guard('sanctum_corp')->user();

        if (! hash_equals((string) $request->route('id'), (string) $corp->id)) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($corp->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($corp->hasVerifiedEmail()) {
            return new Response('', 204);
        }

        if ($corp->markEmailAsVerified()) {
            event(new Verified($corp));
        }

        if ($response = $this->verified($request)) {
            return $response;
        }

        return new Response('', 204);
    }

    /**
     * The user has been verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function verified(Request $request)
    {
        //
    }

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/corp';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth_corp');
//        $this->middleware('signed')->only('verify');
//        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
