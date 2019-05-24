<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const COLORS = [
        0 =>'black',
        1 =>'blue',
        2 =>'yellow',
        3 =>'pink',
    ];
    public function getColorNameAttribute()
    {
        if (array_key_exists($this->color, self::COLORS)) {
            return self::COLORS[$this->color];
        }
        return 'unkown';
    }
    protected $appends = ['color_name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
