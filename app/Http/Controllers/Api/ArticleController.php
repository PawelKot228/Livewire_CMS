<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Vendor\Api;

class ArticleController extends Controller
{

    public function get($id = 0)
    {
        $item = Article::with(['gallery'])
            ->where('status', 1)
            ->first();

        if (!$item) {
            return Api::error()
                ->message('article_does_not_exist')
                ->response();
        }


        return Api::success()->data([
            'id' => $item->getKey(),
            'title' => $item->article_title,
            'lead' => $item->article_lead,
            'text' => $item->article_text,
            'cover' => optional($item->getCover())->getUrl() ?? '',
            'created_at' => $item->created_at,
        ])->response();
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

        return Api::success()
            ->data($articles)
            ->response();
    }
}
