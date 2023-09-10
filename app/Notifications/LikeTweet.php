<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LikeTweet extends Notification
{
    use Queueable;
    public $post;
    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(Post $post,User $user)
    {
        $this->post=$post;
        $this->user=$user;



    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail']; 
    }
    
    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $url = url('/posts/'.$this->post->id);
    
        return (new MailMessage)
            ->greeting('Hello!')
            ->line('Someone liked your post!')
            ->line('Post Title: ' . $this->post->title)
            ->action('View Post', $url)
            ->line('Thank you for using our application!');
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user'=>$this->user->toArray(),
            'post'=>$this->post->toArray(), //saved data in the notifications table
           

            
        ];
    }
}
