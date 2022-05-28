<?php

namespace App\Form\Admin;

use App\Models\ArticleCategory;
use App\Vendor\Form;
use App\Vendor\FormElements\FormCheckboxElement;
use App\Vendor\FormElements\FormSelectElement;
use App\Vendor\FormElements\FormTextareaElement;
use App\Vendor\FormElements\FormTextElement;

class ArticleForm extends Form
{
    public function __construct()
    {
        parent::__construct();

        $options = [0 => __('admin.label.none')];
        foreach (ArticleCategory::where('status', 1)
                     ->get() as $cat) {
            $options[$cat->getKey()] = $cat->article_category_title;
        }

        $this->append(new FormSelectElement('id_article_category', [
            'label' => __('admin.label.category'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
            'options' => $options,
        ]));

        $this->append(new FormTextElement('article_title', [
            'label' => __('admin.label.title'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]));

        $this->append(new FormTextElement('article_lead', [
            'label' => __('admin.label.lead'),
            'class' => 'form-control',
            'validation' => 'max:255',
            'group' => 'formdata',
        ]));

        $this->append(new FormTextareaElement('article_text', [
            'label' => __('admin.label.text'),
            'class' => 'form-control ckeditor',
            //'validation' => 'max:5120',
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
