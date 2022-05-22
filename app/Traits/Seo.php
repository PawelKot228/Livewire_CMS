<?php

namespace App\Traits;

use App\Models\Seo as SeoModel;
use Illuminate\Support\Facades\Route;

trait Seo
{

    public function url()
    {
        if ($this->seo){
            return url($this->seo->slug);
        }

        return '';
    }

    public function seo()
    {
        return $this->belongsTo(SeoModel::class, $this->primaryKey, 'source_id')
            ->where('source_table', $this->getTable());
    }

}
