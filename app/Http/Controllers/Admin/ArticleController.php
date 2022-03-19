<?php

namespace App\Http\Controllers\Admin;

use App\Form\Admin\ArticleForm;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {

        return view('admin.article.index');
    }

    public function edit($id = 0)
    {
        $form = new ArticleForm();
        $obj = $id > 0 ? Article::find($id) : new Article();

        if (request()->isMethod('post')) {
            $post = request()->get('formdata', []);

            if ($form->validate($post)) {
                $obj->fill($post)->save();
                session()->flash('success', [__('admin.toast.form.saved')]);
            } else {
                session()->flash('danger', [__('admin.toast.form.validation_fail')]);
            }


            return to_route('admin.article.edit', ['id' => $obj->getKey()]);
        }


        $form->fillElements($obj);

        return view('admin.article.edit', ['form' => $form]);
    }

    public function delete()
    {
        //
    }
}
