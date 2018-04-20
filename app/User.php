<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    const UNVERIFIED_USER 	= '0';
    const VERIFIED_USER 	= '1';

    const ADMIN_USER 	= 'true';
    const REGULAR_USER 	= 'false';

    protected $table 	= 'users';

    protected $fillable = [
        'name', 
        'email', 
        'password',
        'verified',
        'verification_token',
    ];

    protected $hidden 	= [
        'password', 'remember_token',
    ];

    protected $dates 	= ['deleted_at'];

    public function isAdmin()
    {
    	return $this->admin == User::ADMIN_USER;
    }

    public function isVerified()
    {
    	return $this->verified == User::VERIFIED_USER;
    }

    public static function generateVerificationCode()
    {
    	return str_random(40);
    }
}
