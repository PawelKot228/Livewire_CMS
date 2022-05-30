<?php

namespace App\Http\Controllers\Admin;

use App\Form\Admin\ConstantForm;
use App\Http\Controllers\Controller;
use App\Models\Constant;

class ConstantController extends Controller
{
    public function index()
    {
        $form = new ConstantForm();


        if (request()->isMethod('POST')){
            $post = request()->get('formdata');

            if ($form->validate($post)){
                foreach ($post as $key => $val){
                    $const = Constant::where('constant_label', $key)
                        ->first() ?? new Constant();

                    $const->fill([
                        'constant_label' => $key,
                        'constant_text' => $val ?? '',
                        'lang' => app()->getLocale(),
                    ])->save();
                }
                session()->flash('toast', [__('admin.toast.form.saved')]);


            } else {
                session()->flash('toast', [__('admin.toast.form.validation_fail')]);
            }


            return to_route('admin.constant.index')->withErrors($form->errors);
        }
        $constants = [];
        $consts = Constant::where('lang', app()->getLocale())
            ->get();

        foreach ($consts as $const) { $constants[$const->constant_label] = $const->constant_text; }

        $form->fillElements($constants);

        return view('admin.constant.index', ['form' => $form]);
    }
    public function edit()
    {
        //
    }
    public function delete()
    {
        //
    }
}
