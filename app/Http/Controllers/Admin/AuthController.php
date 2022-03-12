<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:web')->except('logout');
    }

    public function login()
    {
        if (request()->isMethod('POST')) {
            $post = request()->input('formdata', []);

            if (Auth::guard('admin')->attempt($post)) {
                //dd(Auth::guard('admin')->user());
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

    }
}
