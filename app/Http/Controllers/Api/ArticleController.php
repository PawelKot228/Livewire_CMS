<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{
    public function get()
    {
        $cats = ArticleCategory::with(['gallery'])
            ->where('status', 1)
            ->select(['id_article_category', 'article_category_title', 'article_category_lead'])
            ->get();


        foreach ($cats as $cat) {
            $cat->cover = optional($cat->getCover())->getUrl();
            $cat->unsetRelations();
        }

        return [
            'status' => 'OK',
            'data' => $cats->toArray(),
        ];
    }
}
