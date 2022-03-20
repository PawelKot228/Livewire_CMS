<?php

namespace App\Form\Admin;

use App\Vendor\Form;

class ArticleCategoryForm extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->createFormElement('article_category_title', 'text', [
            'label' => __('admin.label.title'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]);

        $this->createFormElement('article_category_lead', 'text', [
            'label' => __('admin.label.lead'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]);

        $this->createFormElement('article_category_text', 'textarea', [
            'label' => __('admin.label.text'),
            'class' => 'form-control',
            'validation' => 'max:512',
            'group' => 'formdata',
        ]);

        $this->createFormElement('status', 'checkbox', [
            'label' => __('admin.label.status'),
            'class' => 'form-check-input',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]);
    }


}
