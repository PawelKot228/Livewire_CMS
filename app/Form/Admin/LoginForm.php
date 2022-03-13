<?php

namespace App\Form\Admin;

use App\Vendor\Form;

class LoginForm extends Form
{
    public function __construct()
    {
        $this->createFormElement('login', 'text', [
            //'id' => 'login',

            'label' => '',
            'placeholder' => 'login',
            'class' => 'form-control',
            'group' => 'formdata',
            'icon' => '<span class="fas fa-envelope"></span>',
        ]);

        $this->createFormElement('password', 'text', [
            'label' => '',
            'placeholder' => 'password',
            'class' => 'form-control',
            'group' => 'formdata',
        ]);
    }


}
