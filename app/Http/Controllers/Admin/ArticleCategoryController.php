<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ArticleCategoryDataTable;
use App\Form\Admin\ArticleCategoryForm;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $dataTable = new ArticleCategoryDataTable();

        if (request()->ajax()) {
            $db = ArticleCategory::with([]);

            return $dataTable->dataTable($db)->toJson();
        }

        return $dataTable->render('admin.article-category.index');
    }

    public function edit($id = 0)
    {
        $form = new ArticleCategoryForm();
        $obj = $id > 0 ? ArticleCategory::find($id) : new ArticleCategory();

        if (request()->isMethod('post')) {
            $post = request()->get('formdata', []);
            $exit = request()->input('exit', 0);

            if ($form->validate($post)) {
                $obj->fill($post)->save();
                session()->flash('success', [__('admin.toast.form.saved')]);

                if ($exit) {
                    return to_route('admin.article-category.index');
                }
            } else {
                session()->flash('danger', [__('admin.toast.form.validation_fail')]);
            }


            return to_route('admin.article-category.edit', ['id' => $obj->getKey()]);
        }


        $form->fillElements($obj);

        return view('admin.article-category.edit', ['form' => $form]);
    }

    public function delete()
    {
        //
    }
}
