<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Constant extends Authenticatable
{
    protected $table = 'constant';
    protected $primaryKey = 'id_constant';
    protected $guarded = ['id_constant'];

    public static function getConstant($label)
    {
        return self::where('constant_label', $label)->first() ?? '';
    }
}
