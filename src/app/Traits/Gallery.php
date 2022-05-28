<?php

namespace App\Traits;

use App\Models\GalleryItem;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Gallery
{
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
