<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $primaryKey = 'id_article';
    protected $guarded = ['id_article'];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'id_article_category', 'id_article_category');
    }

    public function seo()
    {
        return $this->belongsTo(Seo::class, $this->primaryKey, 'source_id')
            ->where('source_table', $this->getTable());
    }

}
