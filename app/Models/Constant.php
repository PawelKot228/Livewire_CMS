<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
    protected $table = 'constant';
    protected $primaryKey = 'id_constant';
    protected $guarded = ['id_constant'];

    public static function getConstant($label)
    {
        return self::where('constant_label', $label)->first() ?? '';
    }
}
