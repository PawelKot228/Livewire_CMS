<?php

namespace App\Models;

use App\Traits\Gallery;
use App\Traits\Seo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Seo, Gallery;

    protected $table = 'article';
    protected $primaryKey = 'id_article';
    protected $guarded = ['id_article'];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'id_article_category', 'id_article_category');
    }
}
