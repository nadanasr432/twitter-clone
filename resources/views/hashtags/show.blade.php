@extends('layouts.app')
@section('content')
<ul>
    <li>
    <div class="flex">
        <div class="flex-1 m-2">
            <h2 class="px-4 py-2 text-xl w-48 font-semibold text-white">Germany trends</h2>
        </div>
        
    </div>
</li>
</ul>
@php
use App\Models\Post;
    $sortedHashtags = $uniqueHashtags->toArray();
    usort($sortedHashtags, function ($a, $b) {
        $countA = Post::where('body', 'like', '%' . $a . '%')->count();
        $countB = Post::where('body', 'like', '%' . $b . '%')->count();
        return $countB - $countA;
    });
@endphp

<ul>
    @foreach ($sortedHashtags as $hashtag)
    @php
    $count = Post::where('body', 'like', '%' . $hashtag . '%')->count();
    @endphp
        <li>
            <div class="flex">
                <div class="flex-1">
                    <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">1 . Trending</p>
                    <h2 class="px-4 ml-2 w-48 font-bold text-white">{{ $hashtag }}</h2>
                    <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">{{ $count }} Tweets</p>
                </div>
                <div class="flex-1 px-4 py-2 m-2">
                    <a href="{{ route('posts.by.hashtag', $hashtag) }}"
                        class="text-2xl rounded-full text-gray-400 hover:bg-blue-800 hover:text-blue-300 float-right">
                        <svg class="m-2 h-5 w-5" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <hr class="border-gray-600">
        </li>
    @endforeach
</ul>

@endsection
