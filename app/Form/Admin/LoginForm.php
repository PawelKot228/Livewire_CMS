<?php

namespace App\Form\Admin;

use App\Vendor\Form;
use App\Vendor\FormElements\FormPasswordElement;
use App\Vendor\FormElements\FormTextElement;

class LoginForm extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->append(new FormTextElement('login', [
            'label' => '',
            'placeholder' => __('admin.label.login'),
            //'icon' => '<span class="fas fa-envelope"></span>',
            'class' => 'form-control',
            'validation' => 'required',
            'group' => 'formdata',
        ]));

        $this->append(new FormPasswordElement('password', [
            'label' => '',
            'placeholder' => __('admin.label.password'),
            //'icon' => '<span class="fas fa-lock"></span>',
            'class' => 'form-control',
            'validation' => 'required|min:4',
            'group' => 'formdata',
        ]));
    }


}
