<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index.index');
    }

    public function redirect()
    {
        return to_route('admin.index');
    }

    public function darkMode()
    {
        $dark_mode = request()->input('dark_mode', 1);

        $validate = Validator::make(
            ['dark_mode' => $dark_mode],
            ['dark_mode' => 'required|int|digits_between:0,1']
        );

        if ($validate->fails()){
            return [
                'status' => __('admin.api.response.fail'),
                'message' => $validate->getMessageBag(),
            ];
        }

        DB::beginTransaction();
        try {
            $obj = \Auth::guard('admin')->user();
            $obj->dark_mode = (int)$dark_mode;
            $obj->save();

            DB::commit();
        } catch (\Exception){
            DB::rollBack();
            return [
                'status' => __('admin.api.response.error'),
                'message' => "Could not finish the task",
            ];
        }

        return [
            'status' => __('admin.api.response.success')
        ];
    }

}
