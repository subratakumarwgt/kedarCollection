<?php

namespace App\Mail;

use App\Models\emailTemplate as ModelsEmailTemplate;
use App\Models\Order;
use App\View\Components\emailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class orderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $template;
    public $order;
    public function __construct(Order $order)
    {
        // echo str_replace("App\\Mail\\","",get_class($this));
        $this->template = ModelsEmailTemplate::getTemplateByName(str_replace("App\\Mail\\","",get_class($this)));
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            "order" => $this->order,
            "template" => $this->template
        ];
        $view = new emailTemplate($data);
        $this->html= $view->render();
        $this->subject($this->template->subject);
        return $this;
        
      

    }
}

