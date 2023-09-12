<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostRetweetController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function store(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
        $result=auth()->user()->retweets()->toggle($post->id);
        
    return response()->json([
      'status'=>'success',
      'count'=> count($post->retweets),
       'isLike'=>count($result['attached'])
    ]);
    }
}
