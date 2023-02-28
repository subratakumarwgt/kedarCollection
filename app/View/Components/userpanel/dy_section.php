<?php

namespace App\View\Components\userpanel;

use App\Models\Section;
use Illuminate\View\Component;

class dy_section extends Component
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
    public $data;
    public function __construct(Section $section)
    {
        //
       
        $this->section = $section;
        $this->resources = $this->section->itemGroups();
        $this->items = [];
        $this->slug = $this->section->slug; 
        
        foreach ($this->resources as $key => $resource) {
          $id_list = $this->section->items->where("model",$resource)->pluck("model_id");
          $model = "\\App\\Models\\" . $resource;
	      $model = new $model();
          $this->items[] = $model->whereIn("id",$id_list)->get();
        }
        $data["section"] = $this->section;
        $data["resources"] = $this->resources;
        $data["items"] = $this->items;
       

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.userpanel.dy_section');
    }
}
