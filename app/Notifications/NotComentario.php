<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotComentario extends Notification
{
    public $post_id;
    public $post_title;
    public $user_id;
    public $user_name;
    public $content;
    use Queueable;

    public function __construct($post_id,$post_title,$user_id,$user_name,$content)
    {
        $this->post_id=$post_id;
        $this->post_title=$post_title;
        $this->user_id=$user_id;
        $this->user_name=$user_name;
        $this->content=$content;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'content' => $this->content,
            'post_id' => $this->post_id,
            'post_title' => $this->post_title,
            'user_id' => $this->user_id,
            'user_name' => $this->user_name,
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
