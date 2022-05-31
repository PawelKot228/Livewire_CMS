<?php

namespace App\Traits;

use App\Models\GalleryItem;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

trait Gallery
{
    public function getCoverUrl()
    {
        $cover = $this->getCover();

        if ($cover) {
            return $cover->getUrl();
        }

        return asset('images/no_image.png');
    }

    public function getCover()
    {
        return $this->gallery()
            ->where('status', 1)
            ->where('cover', 1)
            ->first();
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(GalleryItem::class, 'source_id', $this->primaryKey)
            ->where('source_table', $this->getTable());
    }
}
