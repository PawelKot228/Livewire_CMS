<?php

namespace App\Http\Controllers\Admin;

use App\Form\Admin\LoginForm;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class AuthController extends Controller
{
    public function login()
    {
        $form = new LoginForm();

        if (request()->isMethod('POST')) {
            $post = request()->get('formdata', []);

            $remember_me = (bool)request()->input('remember', false);

            if ($form->validate($post)) {
                if (Auth::guard('admin')->attempt($post, $remember_me)) {
                    session()->flash('success', [__('admin.toast.successfully_logged')]);
                    return redirect()->intended('/admin/index');
                }

                session()->flash('error', [__('admin.toast.credentials_not_match')]);
            } else {

                session()->flash('error', [__('admin.toast.form.validation_fail')]);
            }

            return to_route('admin.auth.login')->withErrors($form->errors);

        }

        return view('admin.auth.login', ['form' => $form]);
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function forgot()
    {
        return view('admin.auth.forgot-password');
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('admin')->logout();

        return to_route('admin.auth.login');
    }
}
