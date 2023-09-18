@extends('layouts.app')

@section('content')
    <div class="flex">
        <div class="m-2 w-10 py-1">
            <img class="inline-block h-10 w-10 rounded-full" src="{{ $quotePost->user->avatar_url }}" alt="">
        </div>
        @auth
            <form action="{{ route('post.quotes.store') }}" method="post" class="mb-4" enctype="multipart/form-data">
                @csrf
                <div class="flex-1 px-2 pt-2 mt-2">
                    <textarea name="body" id="body" class="bg-transparent text-gray-400 font-medium text-lg w-full" rows="4"
                        cols="50" placeholder="Write a quote!"></textarea>
                    @error('body')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <input type="hidden" name="quoted_post_id" value="{{ $quotePost->id }}">
                <div class="flex flex-shrink-0 p-4 pb-0">
                    <a href="{{ route('users.post', $quotePost->user) }}" class="flex-shrink-0 group block">
                        <div class="flex items-center">
                            <img class="inline-block h-10 w-10 rounded-full" src="{{ $quotePost->user->avatar_url }}"
                                alt="">
                            <div class="ml-3">
                                <p class="text-base leading-6 font-medium text-white">
                                    {{ $quotePost->user->name }}
                                    <span
                                        class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $quotePost->created_at->diffForHumans() }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="pl-16">
                    <p class="text-base width-auto font-medium text-white flex-shrink">
                        {{ $quotePost->body }}
                        @foreach ($quotePost->images ?? [] as $image)
                            <img src="{{ asset('images/' . $image->src) }}">
                        @endforeach
                    </p>

                    <div class="flex">
                        <div class="w-10"></div>

                        <div class="w-64 px-2">

                            <div class="flex items-center">
                                <div class="flex-1 text-center px-1 py-1 m-2">
                                    <label>
                                        <input type="file" name="src" accept="image/*" class="hidden">
                                        <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </label>
                                </div>
                                <div class="flex-1 text-center py-2 m-2">
                                    <a href="#"
                                        class="mt-1 group flex items-center text-blue-400 px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                                        <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                            </path>
                                            <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="flex-1 text-center py-2 m-2">
                                    <a href="#"
                                        class="mt-1 group flex items-center text-blue-400 px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                                        <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>


                                <div class="flex-1">
                                    <button type="submit"
                                        class="bg-blue-400 mt-5 hover:bg-blue-600 text-white font-bold py-2 px-8 rounded-full mr-8 float-right">
                                        QUOTE
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endauth
    </div>
@endsection
