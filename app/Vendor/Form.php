<?php

namespace App\Vendor;

abstract class Form
{
    private $form_elements = [];


    public function createFormElement($name, $type, $data)
    {
        $this->form_elements[$name] = new FormElement($name, $type, $data);
    }


    public function renderFormElement($name)
    {
        if (isset($this->form_elements[$name])) {
            return $this->form_elements[$name]->renderFormElement();
        }

        return null;
    }

}
