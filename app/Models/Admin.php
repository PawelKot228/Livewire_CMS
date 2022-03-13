<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $guarded = ['id_admin'];

    protected $hidden = [
      'password',
      'remember_token',
    ];

    public function hasDarkMode()
    {
        return (bool)$this->dark_mode;
    }
}
