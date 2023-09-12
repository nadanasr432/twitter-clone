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
use App\Services\FCMService;
class PostLikeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
  public function store(Request $request) {
        $post = Post::findOrFail($request->post_id);
        // dd($post->id);
        $result = auth()->user()->likes()->toggle($post->id);
    if (count($result['attached']) && $post->user_id !== auth()->user()->id) {
        $post->user->notify(new LikeTweet($post, auth()->user()));
       

            $user = $post->user;

        
        FCMService::send(
            $user->fcm_token,
            [
                'title' =>auth()->user()->name,
                'body' =>'has liked your post'
            ]
        );
    }
        

    return response()->json([
      'status'=>'success',
      'count'=> count($post->likes),
      'isLike'=>count($result['attached'])
    ]);
}

   
// public function destroy(Post $post, Request $request)
// {
//     $request->user()->likes()->where('post_id', $post->id)->delete();
    
//     return back();
// }

}