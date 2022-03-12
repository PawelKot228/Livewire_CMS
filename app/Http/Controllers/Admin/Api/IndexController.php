<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Session;

class IndexController extends Controller
{
    public function darkMode()
    {
        $dark_mode = (bool)request()->input('dark_mode', 1);

        $validate = \Validator::make(
            ['dark_mode' => $dark_mode],
            ['dark_mode' => 'required|boolean']
        );

        if ($validate->passes()){
            Session::put('dark_mode', $dark_mode);

            return [
                'status' => __('admin.api.response.success')
            ];
        }

        return [
            'status' => __('admin.api.response.fail'),
            'message' => $validate->getMessageBag(),
        ];
    }
}
