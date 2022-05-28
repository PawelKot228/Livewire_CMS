<?php

namespace App\Vendor\FormElements;

use App\Vendor\FormElement;

class FormFileElement extends FormElement
{
    protected $class = 'custom-file-input';
    protected $label_class = 'custom-file-label';

    public function renderFormElement()
    {
        $html = "<div class='$this->form_wrap_class'>";
        $html .= $this->renderLabel();

        $html .= "<div class='input-group'>";
        $html .= $this->renderElement();
        $html .= $this->renderErrorElement();
        //dd($this->errors);

        $html .= $this->renderAppendElement();


        $html .= '</div></div>';

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

        return "<label $for>$this->label</label>";
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
        $html = '<div class="custom-file">';
        $html .= "<input type='file' class='$this->class $invalid' id='$this->id'"
            . "name='$name' placeholder='$this->placeholder' $attr value='$this->value'>";


        $for = !empty($this->id)
            ? "for='$this->id'"
            : '';

        $html .= "<label $for class='$this->label_class'>$this->placeholder</label>";
        $html .= '</div>';

        return $html;
    }
}
