<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primarykey = 'id';
    
    protected $fillable = [
        'name', 'role', 'instansi', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const ADMIN_TYPE = 'admin';
    const USERS_TYPE = 'softwaretester';

    public function isAdmin() {
        return $this->role === self::ADMIN_TYPE;
    }

    public function isUser() {
        return $this->role === self::USERS_TYPE;
    }

    public function aplikasi()
    {
        return $this->hasMany(\App\Aplikasi::class);
    }

}
