<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        // if(Route::currentRouteName() == 'posts') {
        $posts = Post::latest()->with(['user', 'likes'])->get();
       
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request )
    {
        $this->validate($request, [
            'body', 
            'parent_id'

        ]);      $post = $request->user()->posts()->create($request->only('body'));
        // get Image Name ;
        if ($request->src) {
            $imageName = time() . "." . $request->src->extension();
            $request->src->move(public_path('images'), $imageName);

      

            $post->images()->create([
                'src' => $imageName,
            ]);
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
    

}