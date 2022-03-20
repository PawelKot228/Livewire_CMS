<?php

namespace App\Vendor;

class FormElement
{
    public $name = '';
    public $validation = '';
    public $value = null;

    private $types = ['text', 'password'];

    private $type = '';
    private $group = '';
    private $id = '';
    private $form_wrap_class = null;
    private $class = '';
    private $placeholder = '';
    private $icon = '';


    private $label = '';
    private $label_class = '';

    public $errors = [];
    private $options = [];
    private $data = [];
    private $attr = [];
    private $accept = [];

    public function __construct($name, $type, $data)
    {
        $this->type = $type;
        $this->name = $name;

        foreach ($data as $key => $val) {
            switch ($key) {
                case 'group':
                    $this->group = $val;
                    break;
                case 'name':
                    $this->name = $val;
                    break;
                case 'id':
                    $this->id = $val;
                    break;
                case 'class':
                    $this->class = $val;
                    break;
                case 'placeholder':
                    $this->placeholder = $val;
                    break;
                case 'icon':
                    $this->icon = $val;
                    break;
                case 'form_wrap_class':
                    $this->form_wrap_class = $val;
                    break;
                case 'value':
                    $this->value = $val;
                    break;
                case 'label':
                    $this->label = $val;
                    break;
                case 'label_class':
                    $this->label_class = $val;
                    break;
                case 'validation':
                    $this->validation = $val;
                    break;
                case 'options':
                    $this->options = $val;
                    break;
                case 'data':
                    $this->data = $val;
                    break;
                case 'attr':
                    $this->attr = $val;
                    break;
                case 'accept':
                    $this->accept = $val;
                    break;
            }
        }

        if (empty($this->placeholder) && !in_array('placeholder', $data, true)) {
            $this->placeholder = $this->label;
        }

        if (empty($this->id) && !in_array('id', $data, true)) {
            $default_name = implode('_', [$this->group, $data['name'] ?? $name]);
            $default_name = str_replace(".", '_', $default_name);
            $this->id = $default_name;
        }

        if (empty($this->placeholder) && !in_array('placeholder', $data, true)) {
            $this->placeholder = $this->label;
        }

        if (!$this->form_wrap_class){
            if ($type === 'checkbox'){
                $this->form_wrap_class = 'form-check';
                $this->label_class = 'form-check-label';
            } else {
                $this->form_wrap_class = 'form-group';
            }
        }
    }

    public function renderFormElement()
    {
        $html = "<div class='$this->form_wrap_class'>";



            if ($this->type == 'checkbox'){
                $html .= $this->renderElement();
                $html .= $this->renderLabel();
                $html .= $this->renderErrorElement();

            } else {
                $html .= $this->renderLabel();
                $html .= $this->renderElement();
                $html .= $this->renderErrorElement();
                //dd($this->errors);

                $html .= $this->renderAppendElement();
            }



        $html .= '</div>';

        return $html;
    }




    public function renderAppendElement()
    {
        if ($this->errors || $this->form_wrap_class !== 'input-group'){
            return '';
        }

        return '<div class="input-group-append"><div class="input-group-text">' . $this->icon . '</div></div>';

    }

    public function renderErrorElement()
    {
        $html = '';
        foreach ($this->errors as $error){
            $html .= "<span id='$this->id-error' class='error invalid-feedback'>$error</span>";
        }
        return $html;
    }

    public function renderLabel()
    {
        if (empty($this->label)) {
            return '';
        }

        $for = empty($this->id)
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
        switch ($this->type) {
            case 'text':
                return $this->renderTextElement();
            case 'password':
                return $this->renderPasswordElement();
            case 'textarea':
                return $this->renderTextareaElement();
            case 'checkbox':
                return $this->renderCheckboxElement();
            case 'select':
                return $this->renderSelectElement();
        }

        return '';
    }

    public function renderTextElement()
    {
        $name = $this->generateFormName();
        $invalid = $this->errors ? 'is-invalid' : '';

        $html = "<input type='text' class='$this->class $invalid' id='$this->id'"
            . "name='$name' placeholder='$this->placeholder' value='$this->value'>";

        return $html;
    }

    public function renderPasswordElement()
    {
        $name = $this->generateFormName();
        $invalid = $this->errors ? 'is-invalid' : '';

        $html = "<input type='password' class='$this->class $invalid' id='$this->id'"
            . "name='$name' placeholder='$this->placeholder' value='$this->value'>";

        return $html;
    }

    public function renderTextareaElement()
    {
        $name = $this->generateFormName();
        $invalid = $this->errors ? 'is-invalid' : '';

        $html = "<textarea type='text' class='$this->class $invalid' id='$this->id'"
            . "name='$name' placeholder='$this->placeholder'>"
        . $this->value . "</textarea>";

        return $html;
    }

    public function renderCheckboxElement()
    {
        $name = $this->generateFormName();
        $invalid = $this->errors ? 'is-invalid' : '';

        $value = $this->value > 0
            ? 'checked' : '';

        $html = "<input type='checkbox' class='$this->class $invalid' id='$this->id' name='$name' value='1' $value>";

        return $html;
    }

    public function renderSelectElement()
    {
        $name = $this->generateFormName();
        $invalid = $this->errors ? 'is-invalid' : '';

        $html = "<select type='checkbox' class='$this->class $invalid' id='$this->id' name='$name' >";

        foreach ($this->options as $key => $val){
            $selected = $key === $this->value
                ? 'selected' : '';

            $html .= "<option value='$key' $selected>$val</option>";
        }

        $html .= "</select>";
        return $html;
    }

}
