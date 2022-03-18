<?php

namespace App\Form\Admin;

use App\Vendor\Form;

class LoginForm extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->createFormElement('login', 'text', [
            'label' => '',
            'placeholder' => __('admin.label.login'),
            //'icon' => '<span class="fas fa-envelope"></span>',
            'class' => 'form-control',
            'validation' => 'required',
            'group' => 'formdata',
        ]);

        $this->createFormElement('password', 'text', [
            'label' => '',
            'placeholder' => __('admin.label.password'),
            //'icon' => '<span class="fas fa-lock"></span>',
            'class' => 'form-control mt-2',
            'validation' => 'required|min:4',
            'group' => 'formdata',
        ]);
    }


}
