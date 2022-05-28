<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index($id)
    {
        $obj = Article::with(['gallery'])
            ->find($id);

        return view('web.article.index', [
            'article' => $obj,
        ]);
    }
}
