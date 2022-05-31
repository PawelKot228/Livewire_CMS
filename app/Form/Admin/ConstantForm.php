<?php

namespace App\Form\Admin;

use App\Vendor\Form;
use App\Vendor\FormElements\FormTextareaElement;
use App\Vendor\FormElements\FormTextElement;

class ConstantForm extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->append(new FormTextElement('company_name', [
            'label' => __('admin.label.company_name'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]));

        $this->append(new FormTextElement('company_phone', [
            'label' => __('admin.label.company_phone'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]));

        $this->append(new FormTextElement('company_email', [
            'label' => __('admin.label.company_email'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]));

        $this->append(new FormTextElement('company_facebook', [
            'label' => __('admin.label.company_facebook'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]));

        $this->append(new FormTextElement('company_twitter', [
            'label' => __('admin.label.company_twitter'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]));

        $this->append(new FormTextElement('company_linkedin', [
            'label' => __('admin.label.company_linkedin'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]));

        $this->append(new FormTextareaElement('company_address', [
            'label' => __('admin.label.company_address'),
            //'icon' => '<span class="fas fa-lock"></span>',
            'class' => 'form-control ckeditor',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]));

        $this->append(new FormTextareaElement('company_description', [
            'label' => __('admin.label.company_description'),
            'class' => 'form-control ckeditor',
            'validation' => 'max:512',
            'group' => 'formdata',
        ]));

        $this->append(new FormTextareaElement('company_text', [
            'label' => __('admin.label.company_text'),
            'class' => 'form-control ckeditor',
            'validation' => 'max:512',
            'group' => 'formdata',
        ]));

    }


}
