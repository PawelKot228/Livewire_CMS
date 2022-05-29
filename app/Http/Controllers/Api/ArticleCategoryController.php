<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Vendor\Api;

class ArticleCategoryController extends Controller
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

        return Api::success()
            ->data($cats)
            ->response();
    }
}
