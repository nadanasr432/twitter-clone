<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Notifications\NewCommentNotification;
use App\Services\FCMService;
use Inertia\Inertia;

use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(Request $request)
    {
        $followingId = auth()->user()->followings()->pluck('id')->toArray();
        $followingId[] = auth()->user()->id;

        $posts = Post::latest()->whereIn('user_id', $followingId)->get();

        $locale = $request->session()->get('locale') ?? 'en';
        app()->setLocale($locale);

        return view('posts.index', [
            'posts' => $posts,
            'locale' => $locale
        ]);
    }
    public function show(Post $post, $hashtag,$id)
    {
          
    $quotePost = Post::findOrFail($id);
    $originalPost = Post::find($quotePost->quoted_post_id);
        return view('posts.show', [
            'post' => $post,
            'hashtag' => $hashtag,
            'quotePost'=>$quotePost,
            'originalPost'=>$originalPost
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'nullable',
            'parent_id' => 'nullable'
        ]);
        $post = $request->user()->posts()->create($request->only('body'));
        if ($request->src) {
            $imageName = time() . "." . $request->src->extension();
            $request->src->move(public_path('images'), $imageName);
            $post->images()->create([
                'src' => $imageName,
                'user_id' => auth()->id()
            ]);
        }

        preg_match_all('/#(\w+)/', $post->body, $hashtags);

        foreach ($hashtags[1] as $hashtag) {

            $existingHashtag = Hashtag::firstOrCreate(['name' => $hashtag]);
            $post->hashtags()->attach($existingHashtag->id);
        }

        return back();
    }

    public function storeComment(Request $request, Post $post)
    {
        $user_id = Auth::id();
        // Create a new comment instance
        $comment = new Post([
            'user_id' => $user_id,
            'body' => $request->input('comment'),
            'parent_id' => $post->id

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
        return view('hashtags.show', ['uniqueHashtags' => $uniqueHashtags, 'posts' => $posts]);
    }
    public function showPostsByHashtag($hashtag)
    {
        $postsWithHashtag = Post::where('body', 'like', '%' . $hashtag . '%')->get();

        return view('hashtags.by_hashtag', ['hashtag' => $hashtag, 'posts' => $postsWithHashtag]);
    }
    public function storeQuote(Request $request)
    {
        $this->validate($request, [
            'body' => 'nullable',
            'parent_id' => 'nullable',
            'quoted_post_id' => 'exists:posts,id'

        ]);
            $user = Auth::user();

            $post = new Post();
            $post->user_id = $user->id;
            $post->body = $request->input('body');
            $post->quoted_post_id = $request->input('quoted_post_id');
            $post->save();
             if ($request->src) {
            $imageName = time() . "." . $request->src->extension();
            $request->src->move(public_path('images'), $imageName);
            $post->images()->create([
                'src' => $imageName,
                'user_id' => auth()->id()
            ]);
        }

        preg_match_all('/#(\w+)/', $post->body, $hashtags);

        foreach ($hashtags[1] as $hashtag) {

            $existingHashtag = Hashtag::firstOrCreate(['name' => $hashtag]);
            $post->hashtags()->attach($existingHashtag->id);
        }
          $retweet= Post::findOrFail($request->quoted_post_id);
        
          auth()->user()->retweets()->attach( $retweet->id);
   
        
        return redirect(route('posts'));
        } 

       public function showQuots($id)
      {
       
    $quotePost = Post::findOrFail($id);
    $originalPost = Post::find($quotePost->quoted_post_id);

    return view('posts.post_Quots', compact('quotePost', 'originalPost'));
      }
      

      public function indexI()
      {
          $posts = Post::all(); 
          return Inertia::render('app', ['posts' => $posts]);
      }
      public function getData()
    {
        $data = Post::all();

        $formattedData = $data->map(function ($post) {
            return [
                'id' => $post->id,
                'user_id' => $post->user_id,
                'body' => $post->body,
                'parent_id' => $post->parent_id,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
                'quoted_post_id' => $post->quoted_post_id,
            ];
        });

        return response()->json($formattedData);
    }
    public function updateData(Request $request)
    {
        $postData = $request->input('data');
        foreach ($postData as $data) {
            $post = Post::find($data['id']);
            if ($post) {
                $post->user_id = $data['user_id'];
                $post->body = $data['body'];
                $post->save();
            }
        }
        return response()->json(['result' => 'ok', 'message' => 'Data updated successfully']);
    }
    public function storeData(Request $request)
    {
      
        $request->validate([
            'user_id' => 'required',
            'body' => 'required',

        ]);
        $post = new Post();
        $post->user_id = $request->input('user_id');
        $post->body = $request->input('body');
    
        $post->save();

        
        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }
}
    



    