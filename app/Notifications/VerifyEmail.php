<?php

namespace app\Notifications;

use App;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class VerifyEmail extends VerifyEmailBase
{
    protected function verificationUrl($user)
    {
        $prefix = config('frontend.url') .config('frontend.email_verify_url');
        $routeName = 'verification.verify';
        $temporarySignedURL = URL::temporarySignedRoute(
            $routeName, Carbon::now()->addMinutes(60), ['id' => $user->getKey()]
        );

        return urldecode($prefix . urlencode($temporarySignedURL));
    }

    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return (new MailMessage)
            ->subject(Lang::get('【eqaull】メールアドレスをご確認ください'))
            ->line(Lang::get('下記ボタンをクリックし、メールアドレスを確認してください。'))
            ->action(Lang::get('メールアドレスの確認'), $verificationUrl);
    }
}
