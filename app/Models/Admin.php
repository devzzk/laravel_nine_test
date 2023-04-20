<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Laravel\Passport\HasApiTokens;

class Admin extends User
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guard = 'admin';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'password' => 'encrypted'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
    ];
}
