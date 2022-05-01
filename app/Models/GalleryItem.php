<?php

namespace App\Models;

use App\Vendor\RenderImage;
use Illuminate\Database\Eloquent\Model;
use Livewire\TemporaryUploadedFile;
use Storage;
use Str;

class GalleryItem extends Model
{
    protected $table = 'gallery_item';
    protected $primaryKey = 'id_gallery_item';
    protected $guarded = ['id_gallery_item'];
    protected $casts = [
        'filename_rendered' => 'object',
    ];

    public function user()
    {
        return $this->belongsTo(Admin::class, 'id_user', 'id_admin');
    }

    /**
     * @param TemporaryUploadedFile $file
     * @return void
     */
    public function storeImage(TemporaryUploadedFile $file): void
    {
        $dir = $this->getDir();
        $this->deleteImage();

        //store in the public disk and update filename
        $filename = $file->store($dir, 'upload');
        $this->update(['filename' => $filename]);
    }

    public function deleteImage(): void
    {
        $path = $this->getDir() . $this->filename;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    public function getDir(): string
    {
        return "{$this->getTable()}/$this->source_table/{$this->getKey()}";
    }

    public function getFilename()
    {
        $path_parts = explode('/', $this->filename);
        return end($path_parts);
    }

    public static function getGalleryItems(Model $obj)
    {
        return self::with(['user'])
            ->where('source_id', $obj->getKey())
            ->where('source_table', $obj->getTable())
            ->get();
    }
}
