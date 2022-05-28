<?php

namespace App\Vendor\FormElements;

use App\Vendor\FormElement;

class FormPasswordElement extends FormElement
{
    public function renderFormElement()
    {
        $html = "<div class='$this->form_wrap_class'>";


        $html .= $this->renderLabel();
        $html .= $this->renderElement();
        $html .= $this->renderErrorElement();
        //dd($this->errors);

        $html .= $this->renderAppendElement();


        $html .= '</div>';

        return $html;
    }

    public function renderAppendElement()
    {
        if ($this->errors || $this->form_wrap_class !== 'input-group') {
            return '';
        }

        return '<div class="input-group-append"><div class="input-group-text">' . $this->icon . '</div></div>';

    }

    public function renderErrorElement()
    {
        $html = '';
        foreach ($this->errors as $error) {
            $html .= "<span id='$this->id-error' class='error invalid-feedback'>$error</span>";
        }
        return $html;
    }

    public function renderLabel()
    {
        if (empty($this->label)) {
            return '';
        }

        $for = !empty($this->id)
            ? "for='$this->id'"
            : '';

        $class = !empty($this->label_class)
            ? "class='$this->label_class'"
            : '';

        return "<label $for $class>$this->label</label>";
    }

    private function generateFormName()
    {
        if (empty($this->group)) {
            return $this->name;
        }

        $el = '[' . str_replace('.', '][', $this->name);
        $el = rtrim($el, '[') . ']';
        return $this->group . $el;

    }

    public function renderElement()
    {
        $name = $this->generateFormName();
        $invalid = $this->errors ? 'is-invalid' : '';

        $attr = $this->attr();

        $html = "<input type='password' class='$this->class $invalid' id='$this->id'"
            . "name='$name' placeholder='$this->placeholder' $attr value='$this->value'>";

        return $html;
    }
}
