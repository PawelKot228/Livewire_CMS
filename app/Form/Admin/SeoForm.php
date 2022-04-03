<?php

namespace App\Form\Admin;

use App\Vendor\Form;
use App\Vendor\FormElements\FormPasswordElement;
use App\Vendor\FormElements\FormTextareaElement;
use App\Vendor\FormElements\FormTextElement;

class SeoForm extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->append(new FormTextElement('slug', [
            'label' => '',
            'placeholder' => __('admin.label.slug'),
            //'icon' => '<span class="fas fa-envelope"></span>',
            'class' => 'form-control',
            'validation' => 'required',
            'group' => 'seodata',
            'attr' => [
                'wire:model' => 'slug'
            ]
        ]));

        $this->append(new FormTextElement('seo_title', [
            'label' => '',
            'placeholder' => __('admin.label.title'),
            //'icon' => '<span class="fas fa-envelope"></span>',
            'class' => 'form-control',
            'validation' => 'required',
            'group' => 'seodata',
            'attr' => [
                'wire:model' => 'title'
            ]
        ]));

        $this->append(new FormTextareaElement('seo_description', [
            'label' => '',
            'placeholder' => __('admin.label.description'),
            //'icon' => '<span class="fas fa-envelope"></span>',
            'class' => 'form-control',
            //'validation' => 'required',
            'group' => 'seodata',
            'attr' => [
                'wire:model' => 'description'
            ]
        ]));

        $this->append(new FormTextareaElement('seo_keywords', [
            'label' => '',
            'placeholder' => __('admin.label.keywords'),
            //'icon' => '<span class="fas fa-envelope"></span>',
            'class' => 'form-control',
            //'validation' => 'required',
            'group' => 'seodata',
            'attr' => [
                'wire:model' => 'keywords'
            ]
        ]));


    }


}
