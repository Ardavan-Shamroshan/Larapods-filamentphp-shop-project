<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
       'name',
       'email',
       'email_verified_at',
       'mobile',
       'mobile_verified_at',
       'password',
       'role',
       'avatar_url',
       'ip',
       'agent',
       'status',
       'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'mobile_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }
}
