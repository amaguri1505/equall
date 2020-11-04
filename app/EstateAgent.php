<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyCorpEmail;
use Laravel\Sanctum\HasApiTokens;

class EstateAgent extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'estate_agents';
    protected $guard = 'sanctum_corp';


    protected $fillable = [
        'name', 'email', 'password', 'tel', 'license_number', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'created_at',
        'updated_at',
        'email_verified',
        'email_verify_token',
        'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyCorpEmail);
    }
}
