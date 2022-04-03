<?php

namespace App\Vendor;

abstract class FormElement
{
    public $name = '';
    public $validation = '';
    public $value = null;

    protected $types = ['text', 'password'];

    protected $type = '';
    protected $group = '';
    protected $id = '';
    protected $form_wrap_class = 'form-group';
    protected $class = '';
    protected $placeholder = '';
    protected $icon = '';


    protected $label = '';
    protected $label_class = '';

    public $errors = [];
    protected $options = [];
    protected $data = [];
    protected $attr = [];
    protected $accept = [];

    public function __construct($name, $data)
    {
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


    }

    protected function attr()
    {
        $attr = [];

        foreach ($this->attr as $key => $val){
            $attr[] = "$key=\"$val\"";
        }

        return implode(' ', $attr);
    }

}
