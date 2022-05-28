<?php

namespace App\Form\Admin;

use App\Vendor\Form;
use App\Vendor\FormElements\FormCheckboxElement;
use App\Vendor\FormElements\FormTextareaElement;
use App\Vendor\FormElements\FormTextElement;

class ArticleCategoryForm extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->append(new FormTextElement('article_category_title', [
            'label' => __('admin.label.title'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
            'attr' => [
                ':model' => '$slug'
            ]
        ]));

        $this->append(new FormTextareaElement('article_category_lead', [
            'label' => __('admin.label.lead'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]));

        $this->append(new FormTextareaElement('article_category_text', [
            'label' => __('admin.label.text'),
            'class' => 'form-control',
            //'validation' => 'max:512',
            'group' => 'formdata',
        ]));

        $this->append(new FormCheckboxElement('status', [
            'label' => __('admin.label.status'),
            'class' => 'form-check-input',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]));

    }


}
