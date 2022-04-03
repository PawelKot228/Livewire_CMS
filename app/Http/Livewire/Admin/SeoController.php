<?php

namespace App\Http\Livewire\Admin;

use App\Form\Admin\SeoForm;
use App\Models\Seo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SeoController extends Component
{
    public Model $model;

    public string $slug = '';
    public string $title = '';
    public string $description = '';
    public string $keywords = '';

    public $messages = [];
    public $saved;

    public function mount()
    {
        $this->updateInputs();
    }

    public function render()
    {
        $form = new SeoForm();
        $seo = Seo::getSeo($this->model);
        //dump($this->model);d

        $data = $this->getData();
        $form->fillElements($seo ?? []);

        if ($this->saved) {
            $form->validate($data);
        }

        return view('admin.livewire.seo', ['form' => $form, 'seo' => $seo, 'messages' => $this->messages]);
    }

    public function save()
    {
        $form = new SeoForm();

        $data = $this->getData();

        $form->fillElements($data);

        $valid = $form->validate($data);

        if ($valid) {
            $seo = Seo::getSeo($this->model) ?? new Seo();
            $seo->fill($data)->save();
            $this->messages = ['success' => __('admin.toast.form.saved')];
            //dd('saved!!!');

            $this->updateInputs();
        } else{
            $this->messages = ['danger' => __('admin.toast.form.validation_fail')];
        }

        $this->saved = true;
    }

    public function delete()
    {
        DB::beginTransaction();
        try {
            $seo = Seo::getSeo($this->model);
            $seo?->delete();

            $this->messages = ['success' => __('admin.toast.deleted')];

            DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
            $this->messages = ['danger' => $e->getMessage()];
        }
    }

    private function updateInputs($data = [])
    {
        $seo = array_merge(
            $this->getData(),
            optional($this->model->seo)->toArray() ?? [],
            $data
        );

        $this->slug = $seo['slug'] ?? '';
        $this->title = $seo['seo_title'] ?? '';
        $this->description = $seo['seo_description'] ?? '';
        $this->keywords = $seo['seo_keywords'] ?? '';
    }

    private function getData()
    {
        return [
            'source_id' => $this->model->getKey(),
            'source_table' => $this->model->getTable(),
            'slug' => $this->slug,
            'seo_title' => $this->title,
            'seo_description' => $this->description,
            'seo_keywords' => $this->keywords,
        ];
    }
}
