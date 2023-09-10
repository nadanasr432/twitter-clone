<?php

namespace App\Http\Controllers;
use App\Events;
use App\Events\PodcastProcessed;
use App\Mail\MailUser;
use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Notifications\LikeTweet;
use Illuminate\Support\Facades\Event;

class PostLikeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function store(Post $post ,Request $request){
        // dd($post->id);
       $result=auth()->user()->likes()->toggle($post->id);
    if(count($result['attached']) && $post->user_id !== auth()->user()->id){
        $post->user->notify(new LikeTweet($post,auth()->user()));
         
   
    }
    if ($result['attached'] ) {
        // Dispatch the PodcastProcessed event for real-time notification
        event(new PodcastProcessed($post, auth()->user()));
    }

       
        // if (!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()) {
        //     Mail::to($post->user)->send(new MailUser($post->auth()->user(), $post));
        // }
        return back();
}
   
// public function destroy(Post $post, Request $request)
// {
//     $request->user()->likes()->where('post_id', $post->id)->delete();
    
//     return back();
// }

}