<?php

namespace App\Vendor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ViewErrorBag;
use Validator;

abstract class Form
{
    /**
     * @var array         $errors
     * @var FormElement[] $form_elements ;
     */

    public $errors = null;
    private array $form_elements = [];


    public function __construct()
    {
        $errors = session()->get('errors', app(ViewErrorBag::class));
        $this->errors = $errors->getMessages();
    }


    public function createFormElement($name, $type, $data)
    {
        $this->form_elements[$name] = new FormElement($name, $type, $data);
    }


    public function renderFormElement($name)
    {
        if (isset($this->form_elements[$name])) {
            $this->form_elements[$name]->errors = $this->errors[$name] ?? [];
            //dd($this->form_elements[$name]);
            return $this->form_elements[$name]->renderFormElement();
        }

        return null;
    }

    /**
     * @param Model|array $post
     * @return void
     */
    public function fillElements($post)
    {
        /**
         * @var ViewErrorBag $errors
         */

        if (is_object($post)) {
            $post = $post->toArray();
        }

        foreach ($post as $key => $val) {

            if (array_key_exists($key, $this->form_elements)) {
                $this->form_elements[$key]->value = $val;
            }

        }

    }

    public function validate($post, $rules = [])
    {
        /**
         * @var FormElement $form_element
         */
        if (empty($rules)) {
            foreach ($this->form_elements as $form_element) {
                $rules[$form_element->name] = $form_element->validation;
            }
        }

        $validator = Validator::make($post, $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors()->getMessages();

        return false;
    }

}
