<?php

namespace App\Form\Admin;

use App\Vendor\Form;
use App\Vendor\FormElements\FormCheckboxElement;
use App\Vendor\FormElements\FormFileElement;
use App\Vendor\FormElements\FormPasswordElement;
use App\Vendor\FormElements\FormTextareaElement;
use App\Vendor\FormElements\FormTextElement;

class GalleryItemForm extends Form
{
    public function __construct()
    {
        parent::__construct();
        $group = 'galleryitemdata';

        $this->append(new FormFileElement('filename', [
            'label' => 'filename',
            'placeholder' => 'Select a file',
            'validation' => 'required',
            'group' => $group,
            'attr' => [
                'wire:model' => 'file'
            ]
        ]));

        $this->append(new FormCheckboxElement('status', [
            'label' => __('admin.label.status'),
            'validation' => 'required',
            'group' => $group,
            'attr' => [
                'wire:model' => 'status'
            ]
        ]));

        $this->append(new FormCheckboxElement('cover', [
            'label' => __('admin.label.cover'),
            'validation' => 'required',
            'group' => $group,
            'attr' => [
                'wire:model' => 'cover'
            ]
        ]));

    }


}
