<?php

namespace App\Form\Admin;

use App\Models\ArticleCategory;
use App\Vendor\Form;

class ArticleForm extends Form
{
    public function __construct()
    {
        parent::__construct();

        $options = [ 0 => __('admin.label.none')];
        foreach (ArticleCategory::where('status', 1)
                     ->get() as $cat){
            $options[$cat->getKey()] = $cat->article_category_title;
        }

        $this->createFormElement('id_article_category', 'select', [
            'label' => __('admin.label.category'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
            'options' => $options,
        ]);

        $this->createFormElement('article_title', 'text', [
            'label' => __('admin.label.title'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]);

        $this->createFormElement('article_lead', 'text', [
            'label' => __('admin.label.lead'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]);

        $this->createFormElement('article_text', 'textarea', [
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
