<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Vendor\Api;

class ArticleController extends Controller
{
    public function get()
    {
        $cats = ArticleCategory::with(['gallery'])
            ->where('status', 1)
            ->select(['id_article_category', 'article_category_title', 'article_category_lead'])
            ->get()
            ->map(function (ArticleCategory $item) {
                return [
                    'id' => $item->id_article_category,
                    'title' => $item->article_category_title,
                    'lead' => $item->article_category_lead,
                    'text' => $item->article_category_text,
                    'cover' => optional($item->getCover())->getUrl() ?? '',
                ];
            })->toArray();

        return Api::success()->data($cats)->response();
    }

    public function getArticles($id = 0)
    {
        $articles = Article::with(['gallery'])
            ->where('id_article_category', $id)
            ->where('status', 1)
            ->get()
            ->map(function (Article $item) {
                return [
                    'id' => $item->id_article,
                    'title' => $item->article_title,
                    'lead' => $item->article_lead,
                    'text' => $item->article_text,
                    'cover' => optional($item->getCover())->getUrl() ?? '',
                    'created_at' => $item->created_at->format('H:m d/m/Y'),
                ];
            })->toArray();

        return Api::success()->data($articles)->response();
    }
}
