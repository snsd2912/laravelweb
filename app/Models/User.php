<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usrname',
        'password',
        'name',
        'pos',
        'phone',
        'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function message()
    {
        return $this->hasMany('App\Models\Message', 'id');
    }

    public function assignment()
    {
        return $this->hasMany('App\Models\Assignment', 'id');
    }

    public function submit()
    {
        return $this->hasMany('App\Models\Submit', 'id');
    }

    public function challenge()
    {
        return $this->hasMany('App\Models\Challenge', 'id');
    }
}
