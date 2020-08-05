<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class NotifyPostNewComment extends Notification
{
    /**
     * The post that was updated.
     *
     * @var \App\Post
     */
    protected $post;

    /**
     * The new comment.
     *
     * @var \App\Comment
     */
    protected $comment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post,$comment)
    {
        $this->post=$post;
        $this->comment=$comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via()
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray()
    {
        return [
            'message' => $this->comment->user->name . ' commented to ' . $this->post->body,
         
        ];
    }
}
