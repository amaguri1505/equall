<?php

namespace App\Http\Controllers\Auth\Traits;

use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

trait VerifiesEmails
{
    use RedirectsUsers;

    /**
     * Show the email verification notice.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail() ? redirect($this->redirectPath()) : view('auth.verify');
    }

    /**
     * Mark the authenticated user's email address as verified
     * @param Request $request
     * @param User $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws AuthorizationException
     */
    public function verify(Request $request,User $id)
    {
        if ($id->hasVerifiedEmail()) {
            return response()->json([
                'verified' => true,
                'message' => 'Email Verified Already'
            ]);
        }

        if ($id->markEmailAsVerified()) {
            event(new Verified($id));
        }

        return response()->json([
            'verified' => true,
        ]);
    }

    /**
     * Resend the email verification notification.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json([
                'verified' => true,
                'message' => 'Email Verified Already'
            ]);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json([
            'verified' => false,
            'resent' => true,
            'message' => 'Verification Email sent again'
        ]);
    }
}
