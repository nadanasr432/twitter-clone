<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
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
            'body' => 'nullable', 

        ]);
        // get Image Name ;
        $imageName = time() .".". $request->src->extension();
        $request->src->move(public_path('images'), $imageName);


        $post = $request->user()->posts()->create($request->only('body'));
      
        $post->images()->create([
            'src' => $imageName,
        ]);

        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
    

}