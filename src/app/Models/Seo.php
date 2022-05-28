<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'seo';
    protected $primaryKey = 'id_seo';
    protected $guarded = ['id_seo'];

    private function fixSlug($slug = null)
    {
        $slug = $slug ?? $this->slug;
        $this->slug = str_starts_with($slug, '/')
            ? $slug
            : "/$slug";
    }

    public static function getSeo(Model $model)
    {
        return self::where('source_table', $model->getTable())
            ->where('source_id', $model->getKey())
            ->first();
    }

    public function save(array $options = [])
    {
        $this->fixSlug($options['slug'] ?? null);
        unset($options['slug']);

        return parent::save($options);
    }
}
