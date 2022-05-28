<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;

class ArticleCategoryController extends Controller
{
    public function index($id)
    {
        $obj = ArticleCategory::with(['articles'])
            ->find($id);

        return view('web.article.category.index', [
            'article_category' => $obj,
        ]);
    }
}
