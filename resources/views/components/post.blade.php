@props(['post'])
<div class="flex flex-shrink-0 p-4 pb-0">
    <a href="{{ route('users.post', $post->user) }}" class="flex-shrink-0 group block">
        <div class="flex items-center">
            <img class="inline-block h-10 w-10 rounded-full" src="{{ $post->user->avatar_url }}" alt="">
            <div class="ml-3">
                <p class="text-base leading-6 font-medium text-white">
                    {{ $post->user->name }}
                    <span
                        class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                        {{ $post->created_at->diffForHumans() }}
                    </span>
                </p>
            </div>
        </div>
    </a>
</div>
<div class="pl-16">
    <p class="text-base width-auto font-medium text-white flex-shrink">

        {{ $post->body }}
        @foreach ($post->images ?? [] as $image)
            <img src="{{ asset('images/' . $image->src) }}">
        @endforeach
    </p>
    @php
        $quotePost = \App\Models\Post::findOrFail($post->id);
        $originalPost = \App\Models\Post::find($quotePost->quoted_post_id);
        
    @endphp
    @if ($originalPost)
        <input type="hidden" name="quoted_post_id" value="{{ $originalPost->id }}">
        <div class="border border-gray-300 p-3 rounded-lg mb-3">
            <div class="flex flex-shrink-0 p-4 pb-0">
                <a href="{{ route('users.post', $originalPost->user) }}" class="flex-shrink-0 group block">
                    <div class="flex items-center">
                        <img class="inline-block h-10 w-10 rounded-full" src="{{ $originalPost->user->avatar_url }}"
                            alt="">
                        <div class="ml-3">
                            <p class="text-base leading-6 font-medium text-white">
                                {{ $originalPost->user->name }}
                                <span
                                    class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                    {{ $originalPost->created_at->diffForHumans() }}
                                </span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="pl-16">
                <p class="text-base width-auto font-medium text-white flex-shrink">
                    {{ $originalPost->body }}
                    @foreach ($originalPost->images ?? [] as $image)
                        <img src="{{ asset('images/' . $image->src) }}">
                    @endforeach
                </p>
            </div>
        </div>


    @endif

    <!-- retweet -->
    <div class="flex">
        <div class="w-full">

            <div class="flex items-center">
                <div class="flex-1 text-center">
                    <a href="{{ route('post.comments.show', $post) }}"
                        class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="text-center h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        <span> {{ $post->comments->count() }}</span>
                    </a>

                </div>

                <div
                    class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-red-600 transition duration-350 ease-in-out">
                    <ul>
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown1"
                            style="color: {{ auth()->user()->isRetweet($post)? 'green': 'white' }}">
                            <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                            </svg>
                        </button><span class="retweet_count">{{ count($post->retweets) }} </span>

                        <div id="dropdown1"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow  dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">

                                    <button type="button" class='submit1' data-post-id="{{ $post->id }}"
                                        style="color: {{ auth()->user()->isRetweet($post)? 'green': 'white' }}">
                                        Retweet
                                    </button>


                                <li>
                                    <a href="{{ route('post.quots.show', $post) }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Quote</a>
                                </li>

                                </li>
                            </ul>

                        </div>

                    </ul>

                </div>

                <div
                    class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-red-600 transition duration-350 ease-in-out">
                    <button type="button" class='submit' data-post-id="{{ $post->id }}"
                        style="color: {{ auth()->user()->isLike($post)? 'red': 'white' }}">
                        <svg class="text-center h-6 w-6" fill="currentColor" stroke-linecap="round" viewBox="0 0 24 24">
                            <g>
                                <path
                                    d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                </path>
                            </g>
                        </svg>
                    </button>

                    <span class="like_count">{{ count($post->likes) }} </p>
                </div>

                <div class="flex-1 text-center py-2 m-2">
                    <a href="#"
                        class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                    </a>

                </div>
                <div class="flex-1 text-center py-2 m-2">
                    <a href="#"
                        class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="flex-1 text-center py-2 m-2">
                    <a href="#"
                        class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
<hr class="border-gray-600">
