<?php

namespace App\Models;

use App\Traits\Gallery;
use App\Traits\Seo;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use Seo, Gallery;

    protected $table = 'article_category';
    protected $primaryKey = 'id_article_category';
    protected $guarded = ['id_article_category'];

    public static function getCategories()
    {
        return self::with(['gallery', 'seo'])
            ->where('status', 1)
            ->paginate(10);
    }


    public function articles()
    {
        return $this->hasMany(Article::class, 'id_article_category', 'id_article_category');
    }
}
