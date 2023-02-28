<?php

namespace App\Mail;

use App\Models\emailTemplate as ModelsEmailTemplate;
use App\Models\Order;
use App\View\Components\emailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class paymentSuccessfull extends Mailable
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
        $this->template = ModelsEmailTemplate::getTemplateByName(get_class($this));
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
        // return $view->render();
        return $this
        ->subject($this->template->subject)
        ->content($view->render());
    }
}
