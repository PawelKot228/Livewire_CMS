<?php

namespace App\Http\Livewire\Admin;

use App\Form\Admin\GalleryItemForm;
use App\Models\GalleryItem;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithFileUploads;

class GalleryItemController extends Component
{
    use WithFileUploads;

    public Model $model;
    public Model $gallery_item;

    public $file;
    public int $status = 1;
    public int $cover = 0;
    //public string $keywords = '';

    public function save()
    {
        $obj = GalleryItem::create([
            'id_user' => \Auth::id(),
            'source_id' => $this->model->getKey(),
            'source_table' => $this->model->getTable(),
            'cover' => $this->cover,
            'status' => $this->status,
        ]);
        $obj->storeImage($this->file);
    }

    public function delete($id)
    {
        $obj = GalleryItem::find($id);
        $obj->delete();
    }

    public function changeStatus($id, $type, $status)
    {
        GalleryItem::find($id)
            ->update([$type => $status]);

        if ($type === 'cover'){
            GalleryItem::whereNot('id_gallery_item', $id)
                ->where('source_id', $this->model->getKey())
                ->where('source_table', $this->model->getTable())
                ->update(['cover' => 0]);
        }
    }


    public function render()
    {
        $form = new GalleryItemForm();
        $items = GalleryItem::getGalleryItems($this->model);

        return view('livewire.admin.gallery',
            [
                'items' => $items,
                'form' => $form,
            ]);
    }
}
