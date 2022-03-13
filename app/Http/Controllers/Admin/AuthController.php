<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Session;

class AuthController extends Controller
{
    public function login()
    {
        if (request()->isMethod('POST')) {
            $post = request()->input('formdata', []);
            $remember_me = (bool)request()->input('remember', false);

            if (Auth::guard('admin')->attempt($post, $remember_me)) {
                return redirect()->intended('/admin/index');
            }
        }

        return view('admin.auth.login');
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
