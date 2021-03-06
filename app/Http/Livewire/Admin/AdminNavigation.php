<?php

namespace App\Http\Livewire\Admin;

use Auth;
use Livewire\Component;

class AdminNavigation extends Component
{
    public $filter_word;

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

        return view('admin.livewire.side-panel', [
                'nav_items' => $nav_items,
                'user' => Auth::guard('admin')->user(),
            ]);
    }
}
