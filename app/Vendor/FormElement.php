<?php

namespace App\Vendor;

class FormElement
{
    private $types = ['text', 'password'];

    private $type = '';
    private $group = '';
    private $name = '';
    private $id = '';
    private $class = '';
    private $placeholder = '';
    private $icon = '';

    private $value = null;
    private $errors = [];

    private $label = '';
    private $label_class = '';

    private $validation = '';
    private $options = [];
    private $data = [];
    private $attr = [];
    private $accept = [];

    public function __construct($name, $type, $data)
    {
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

        $this->type = $type;

        if (empty($this->name) && !in_array('name', $data, true)){
            if (empty($this->group)){
                $this->name = $name;
            } else {
                $el =  '[' . str_replace('.', '][', $name);
                $el = rtrim($el, '[') . ']';
                $this->name = $el;
            }
        }

        if (empty($this->placeholder) && !in_array('placeholder', $data, true)){
            $this->placeholder = $this->label;
        }

        if (empty($this->id) && !in_array('id', $data, true)){
            $default_name = implode('_', [$this->group, $data['name'] ?? $name]);
            $default_name = str_replace(".", '_', $default_name);
            $this->id = $default_name;
        }

        if (empty($this->placeholder) && !in_array('placeholder', $data, true)){
            $this->placeholder = $this->label;
        }

    }

    public function renderFormElement()
    {
        $html = '<div class="input-group">';
        $html .= $this->renderLabel();
        $html .= $this->renderElement();

        $html .= $this->renderAppendElement();

        $html .= '</div>';

        return $html;
    }


    public function renderElement()
    {
        switch ($this->type) {
            case 'text':
                return $this->renderTextElement();
        }
    }

    public function renderTextElement()
    {

        $html = "<input type='text' class='$this->class' id='$this->id'  name='$this->name' placeholder='$this->placeholder'>";

        return $html;
    }

    public function renderAppendElement()
    {


        return '<div class="input-group-append"><div class="input-group-text">'. $this->icon .'</div></div>';

    }

    public function renderLabel()
    {
        if (empty($this->label)){
            return '';
        }

        $for = empty($this->id)
            ? "for='$this->id'"
            : '';

        $class = empty($this->label_class)
            ? "class='$this->label_class'"
            : '';

        return "<label $for $class>$this->label</label>";
    }
}
