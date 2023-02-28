<?php

namespace App\View\Components\userpanel;

use App\Models\Page;
use Illuminate\View\Component;

class master extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $page;
    public $slug;
    public $resources;
    public $items;
    public $user_id;
    public $sections;
    public function __construct(Page $page)
    {
        //
        $this->page = $page;
        $this->resources = $this->page->itemGroups();
        $this->items = [];
        foreach ($this->resources as $key => $resource) {
            $id_list = $this->page->items->where("model",$resource)->pluck("model_id");
            $model = "\\App\\Models\\" . $resource;
            $model = new $model();
            $this->items[] = $model->whereIn("id",$id_list)->get();
          }
          foreach ($this->items[0] as $key => $value) {

             $section= new dy_section($value);
             $this->sections[] =  view('components.userpanel.dy_section',[
                "section" => $value,
                "items" => $section->items,
                "resources" => $section->resources
                ])->render();
          }
  
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.userpanel.master');
    }
}
