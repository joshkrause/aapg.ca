<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    use HasApiTokens;

    protected $fillable = [
        'name', 'email', 'password', 'board', 'admin'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
