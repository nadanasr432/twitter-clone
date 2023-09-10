<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Notifications\NewCommentNotification;
use App\Services\FCMService;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $followingId = auth()->user()->followings()->pluck('id')->toArray();
        $followingId[] = auth()->user()->id;

        $posts = Post::latest()->whereIn('user_id',$followingId)->get();
      
       
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post,$hashtag)
    {
        return view('posts.show', [
            'post' => $post,
            'hashtag' => $hashtag
        ]);
    }

    public function store(Request $request )
    {
        $this->validate($request, [
            'body'=>'nullable', 
            'parent_id'=>'nullable'
        ]);
        $post = $request->user()->posts()->create($request->only('body'));
        if ($request->src) {
            $imageName = time() . "." . $request->src->extension();
            $request->src->move(public_path('images'), $imageName);
            $post->images()->create([
                'src' => $imageName,
                'user_id'=> auth()->id()
            ]);
        }
          
        preg_match_all('/#(\w+)/', $post->body, $hashtags);

        foreach ($hashtags[1] as $hashtag) {
       
            $existingHashtag = Hashtag::firstOrCreate(['name' => $hashtag]);
            $post->hashtags()->attach($existingHashtag->id);
        }
        
        return redirect()->back();
    }
  
   public function storeComment(Request $request, Post $post)
{
    $user_id = Auth::id();
    // Create a new comment instance
    $comment = new Post([
        'user_id' => $user_id,
        'body' => $request->input('comment'),
        'parent_id'=>$post->id
        
    ]);
    if ($post->user_id !== $user_id) {
        $post->user->notify(new NewCommentNotification($post, auth()->user()));
        
            $user = $post->user;

        
        FCMService::send(
            $user->fcm_token,
            [
                'title' => auth()->user()->name,
                'body' => 'has commented your tweet',
            ]
        );
    }

    
    // Associate the comment with the post and save it
    $post->comments()->save($comment);

    return redirect()->back()->with('success', 'Comment added successfully');
}
    
 public function showComments(Post $post)
{
    return view('posts.post_comments', compact('post'));
}
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
    public function showHashtag(Hashtag $hashtag)
    {
        $posts = Post::all();
        $uniqueHashtags = collect();
    
        foreach ($posts as $post) {
            $hashtagsInBody = [];
            preg_match_all('/#(\w+)/', $post->body, $hashtagsInBody);
            $uniqueHashtags = $uniqueHashtags->merge($hashtagsInBody[1]);
        }
        $uniqueHashtags = $uniqueHashtags->unique();
        return view('hashtags.show', ['uniqueHashtags' => $uniqueHashtags,'posts'=>$posts]);
    }
    public function showPostsByHashtag($hashtag)
    {
        $postsWithHashtag = Post::where('body', 'like', '%' . $hashtag . '%')->get();

    return view('hashtags.by_hashtag', ['hashtag' => $hashtag, 'posts' => $postsWithHashtag]);
}}