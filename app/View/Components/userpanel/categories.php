<?php

namespace App\View\Components\userpanel;

use App\Models\Section;
use Illuminate\View\Component;

class categories extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $section;
    public $slug;
    public $resources;
    public $items;
    public function __construct()
    {
        //
        $slug = "categories";
        $this->section = Section::getSectionBySlug($slug);
        $this->resources = $this->section->itemGroups();
        $this->items = [];
        
        foreach ($this->resources as $key => $resource) {
          $id_list = $this->section->items->where("model",$resource)->pluck("model_id");
          $model = "\\App\\Models\\" . $resource;
	      $model = new $model();
          $this->items[] = $model->whereIn("id",$id_list)->get();
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.userpanel.categories');
    }
}
