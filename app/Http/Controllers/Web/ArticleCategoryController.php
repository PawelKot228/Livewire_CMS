<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleCategoryController extends Controller
{
    public function index($id)
    {
        $cat = ArticleCategory::with(['gallery', 'articles', 'articles.gallery'])
            ->find($id);

        $articles = $cat->articles()
            ->where('status', 1)
            ->paginate(10);

        return view('web.article.category.index', [
            'article_category' => $cat,
            'articles' => $articles,
        ]);
    }
}
