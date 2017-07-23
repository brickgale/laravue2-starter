<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;


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

    public function isAdmin() {
        return $this->role == \Config::get('laravue.role.admin');
    }

    public function isManager() {
        return $this->role == \Config::get('laravue.role.manager');
    }

    public function isRegular() {
        return $this->role == \Config::get('laravue.role.regular');
    }

    public function getRole() {
        return array_search( $this->role, \Config::get('laravue.role') );
    }
}
