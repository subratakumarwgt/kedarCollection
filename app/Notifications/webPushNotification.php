<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class webPushNotification extends Notification
{
    use Queueable;

    protected $title;
    protected $action;
    protected $url;
    protected $body;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title,$body,$action,$url)
    {
        //
        $this->title = $title;
        $this->body = $body;
        $this->action = $action;
        $this->url = $url;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
         return [WebPushChannel::class];
    }


    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title($this->title)
            ->icon('/notification-icon.png')
            ->body($this->body)
            ->action($this->action, $this->url);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            "title" => $this->title,
            "body" => $this->body,
            "action" => $this->action,
            "url" => $this->url
            //
        ];
    }
}
