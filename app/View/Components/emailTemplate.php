<?php

namespace App\View\Components;

use App\Models\StaticAsset;
use Illuminate\View\Component;

class emailTemplate extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $templateHTML; 
    public $data;
    public $short_codes;
    public function __construct(Array $data)
    {
        //
        $this->templateHTML = $data["template"]->body;
        $this->data = $data;
        $this->short_codes = StaticAsset::getAssetsByTitle("short_codes");
        $this->replaceHTML($this->templateHTML);
        
    }

    private function replaceHTML(){
       
        $short_code_bag = [];
        
        foreach($this->short_codes as $code){
            if(str_contains($this->templateHTML,$code)){
                try {
                    switch ($code) {
                        case '[[user_name]]':
                            $short_code_bag[$code] = $this->data["order"]->user_name;
                            break;
                            case '[[user_contact]]':
                             $short_code_bag[$code] = $this->data["order"]->user_contact;
                                
                                 break;
                                 case '[[order_id]]':
                                    $short_code_bag[$code] = $this->data["order"]->order_id;
                                    
                                     break;
                                     case '[[order_details]]':
                                        $view = new orderDetailsTable($this->data["order"]);
                                        $short_code_bag[$code] =$view->render();
                                       
                                         break;
                                         case '[[payment_id]]':
                                            $short_code_bag[$code] = $this->data["order"]->payment_id;
                                            
                                             break;
                                             case '[[payment_type]]':
                                                $short_code_bag[$code] = $this->data["order"]->payment_type;
                                                 break;
                                                
                        default:
                            # code...
                            break;
                    }
                } catch (\Throwable $th) {
                  continue;
                }

            }
        }
        // print_r($short_code_bag);
        // echo "<br>";
        $find = array_keys($short_code_bag);
        $replace = array_values($short_code_bag);       
        $this->templateHTML = str_replace($find, $replace, $this->templateHTML);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.email-template',["templateHTML" => $this->templateHTML]);
    }
}
