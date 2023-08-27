<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CommentController extends Controller
{
    // ...

    public function store(Request $request, Post $post ,User $user)
    {
        $user_id = Auth::id();
    // Create a new comment with the associated user
    $comment = new post([
       'user_id'=>$user_id,
        'body' => $request->input('comment'),
        'parent_id' => $post->id, 
    ]);
    $post->comments()->save($comment);
  
    //  $imageName = time() .".". $request->src->extension();
    //     $request->src->move(public_path('images'), $imageName);
    //      $post->images()->create([
    //         'src' => $imageName,
    //     ]);
        return redirect()->back()->with('success', 'Comment added successfully');
    }
    public function showComments(Post $post)
{
    $comments = $post->comments;
    return view('posts.post_comments', compact('comments', 'post'));
}
}


 
