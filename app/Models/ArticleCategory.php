<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'article_category';
    protected $primaryKey = 'id_article_category';
    protected $guarded = ['id_article_category'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'id_article_category', 'id_article_category');
    }

}
