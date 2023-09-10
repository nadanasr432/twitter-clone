<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PodcastProcessed;
use App\Notifications\LikeTweet;
class PodcastProcessedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PodcastProcessed $event)
    {
        $post = $event->post;
        $user = $event->user;

        // Check if the post owner is not the same as the liker
        if ($post->user_id !== $user->id) {
            // Send a real-time notification using Pusher
            broadcast(new LikeTweet($post, $user))->toOthers();
        }
    }
    }
