<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminNavigation extends Component
{
    public $filter_word;


    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        $nav = collect(config('admin_nav'));

        $nav_items = $nav;
        if ($this->filter_word){
            $nav_items = [];
            foreach ($nav as $nav_item){
                if (str_contains(strtolower($nav_item['label']), strtolower($this->filter_word))){
                    $nav_items[] = $nav_item;
                }
            }
        }

        return view('livewire.side-panel', ['nav_items' => $nav_items]);
    }
}
