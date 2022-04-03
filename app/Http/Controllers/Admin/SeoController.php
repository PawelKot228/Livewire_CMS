<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SeoDataTable;
use App\Form\Admin\SeoForm;
use App\Http\Controllers\Controller;
use App\Models\Seo;

class SeoController extends Controller
{
    public function index()
    {
        $dataTable = new SeoDataTable();

        if (request()->ajax()){
            $db = Seo::with([]);


            return $dataTable->dataTable($db)->toJson();
        }


        return $dataTable->render('admin.seo.index', ['dataTable' => $dataTable]);
        //return view('admin.seo.index');
    }

    public function edit($id)
    {
        $form = new SeoForm();
        $seo = Seo::find($id);

        $form->fillElements($seo);

        return view('admin.seo.edit', ['form' => $form]);
    }

    public function delete()
    {
        //
    }
}
