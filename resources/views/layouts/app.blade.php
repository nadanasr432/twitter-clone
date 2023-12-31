<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0ed3cf">
        <meta name="msapplication-TileColor" content="#0ed3cf">
        <meta name="theme-color" content="#0ed3cf">

        <meta property="og:image"
            content="https://tailwindcomponents.com/storage/1240/temp38981.png?v=2023-08-20 09:29:50">
        <meta property="og:image:width" content="1280">
        <meta property="og:image:height" content="640">
        <meta property="og:image:type" content="image/png">

        <meta property="og:url" content="https://tailwindcomponents.com/component/twitter-clone/landing">
        <meta property="og:title" content="Twitter Clone by hiravesonali">
        <meta property="og:description" content="Twitter clone with Tailwindcss">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@TwComponents">
        <meta name="twitter:title" content="Twitter Clone by hiravesonali">
        <meta name="twitter:description" content="Twitter clone with Tailwindcss">
        <meta name="twitter:image"
            content="https://tailwindcomponents.com/storage/1240/temp38981.png?v=2023-08-20 09:29:50">

        <link rel="canonical" href="https://tailwindcomponents.com/component/twitter-clone" itemprop="URL">

        <title>{{ __('Twitter') }}</title>
        

        {{-- <link href="https://unpkg.com/tailwindcss@1.4.6/dist/tailwind.min.css" rel="stylesheet"> --}}
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
       
  

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

<body class="bg-gray-200">

    <div class="bg-blue-900">
        <div class="flex">

            <div class="w-2/5 text-white h-12 pl-32 py-4 h-auto">
                <!--left menu-->
                <svg viewBox="0 0 24 24" class="h-12 w-12 text-white" fill="currentColor">
                    <g>
                        <path
                            d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                        </path>
                    </g>
                </svg>

                <nav class="mt-5 px-2">
                    <a href="{{ route('posts') }}"
                        class="group flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full bg-blue-800 text-blue-300">
                        <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6">
                            </path>
                        </svg>
                        {{ __('frontPage.Home') }}
                    </a>
                    <a href="{{ route('hashtag.show') }}"
                        class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                        </svg>

                        {{ __('frontPage.Explore') }}
                    </a>
                    <a href="{{ route('notifications.index') }}" id="notifications-link"
                        class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <i class="fa fa-bell"></i>

                        </span>
                        <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                        {{ __('frontPage.Notifications') }}
                        {{-- @if (auth()->user()->unreadNotifications->count() > 0)
                            <span id="notifications-count-badge"
                                class="text-red-400 mx-1">{{ auth()->user()->unreadNotifications->count() }}</span>
                        @endif --}}
                    </a>
                    <a href="{{ route('user.requests') }}"
                        class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                        {{ __('frontPage.Requests') }}
                    </a>
                    <a href="#"
                        class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ __('frontPage. Messages') }}
                    </a>
                    <a href="#"
                        class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                        </svg>
                        {{ __('frontPage.Bookmarks') }}
                    </a>
                    <a href="{{ route('profile.users') }}"
                        class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                        {{ __('frontPage.Lists') }}
                    </a>

                    <a href="{{ route('users.post', auth()->user()) }}"
                        class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        {{ __('frontPage.Profile') }}
                    </a>
                    <a href="#"
                        class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ __('frontPage.More') }}
                    </a>
                    <a href=""
                        class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        @auth
                            <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                                @csrf
                                <button type="submit">{{ __('frontPage.logout') }}</button>
                            </form>
                        @endauth
                    </a>
                    <button
                        class="bg-blue-400 w-48 mt-5 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                        {{ __('frontPage.Tweet') }}
                    </button>
                </nav>

            </div>
            <div class="w-3/5 border border-gray-600 h-auto  border-t-0">
                @yield('content')
            </div>
            <div class="w-2/5 h-12">
                <!--right menu-->

                <div class="relative text-gray-300 w-80 p-5 pb-0 mr-16">
                    <button type="submit" class="absolute ml-4 mt-3 mr-4">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                            y="0px" viewBox="0 0 56.966 56.966"
                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px"
                            height="512px">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                            </path>
                        </svg>
                    </button>

                    <input type="search" name="search" placeholder={{ __('frontPage.Search Twitter') }}
                        class="bg-blue-800 h-10 px-10 pr-5 w-full rounded-full text-sm focus:outline-none bg-purple-white shadow rounded border-0">

                </div>
                <!--second-trending tweet section-->
                <div class="max-w-sm rounded-lg bg-blue-800 overflow-hidden shadow-lg m-4 mr-20">
                    <div class="flex">
                        <div class="flex-1 m-2">
                            <h2 class="px-4 py-2 text-xl w-48 font-semibold text-white">
                                {{ __('frontPage.Germany trends') }}
                            </h2>
                        </div>
                        <div class="flex-1 px-4 py-2 m-2">
                            <a href=""
                                class=" text-2xl rounded-full text-white hover:bg-blue-800 hover:text-blue-300 float-right">
                                <svg class="m-2 h-6 w-6" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <hr class="border-gray-600">
                    <!-- trending tweet-->
                    <div class="flex">
                        @php
                            // use App\Models\Post;
                            // $postss = Post::all();
                            // $uniqueHashtags = collect();
                            // foreach ($postss as $post) {
                            //     $hashtagsInBody = [];
                            //     preg_match_all('/#(\w+)/', $post->body, $hashtagsInBody);
                            //     $uniqueHashtags = $uniqueHashtags->merge($hashtagsInBody[1]);
                            // }
                            // $uniqueHashtags = $uniqueHashtags->unique();
                            // $sortedHashtags = $uniqueHashtags->toArray();
                            // usort($sortedHashtags, function ($a, $b) {
                            //     $countA = Post::where('body', 'like', '%' . $a . '%')->count();
                            //     $countB = Post::where('body', 'like', '%' . $b . '%')->count();
                            //     return $countB - $countA;
                            // });
                            $sortedHashtags = \App\Models\Hashtag::get();
                        @endphp
                        <ul>
                            @foreach ($sortedHashtags as $index => $hashtag)
                                <li>
                                    <div class="flex">
                                        <div class="flex-1">
                                            <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">{{ $index + 1 }} .
                                                {{ __('frontPage.Trending') }}</p>
                                            <h2 class="px-4 ml-2 w-48 font-bold text-white">
                                                {{ $hashtag->name }}</h2>
                                            <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">
                                                {{ $hashtag->post->count() }}
                                                {{ __('frontPage.Tweets') }}</p>
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

                        <hr class="border-gray-600">


                    </div>
                    <hr class="border-gray-600">
                    <!--show more-->

                    <div class="flex">
                        <div class="flex-1 p-4">
                            <h2 class="px-4 ml-2 w-48 font-bold text-blue-400">{{ __('frontPage.Show more') }}</h2>
                        </div>
                    </div>

                </div>


                <!--third-people suggetion to follow section-->

                <div class="max-w-sm rounded-lg bg-blue-800 overflow-hidden shadow-lg m-4 mr-20">
                    @yield('users')
                </div>

                <div class="flow-root m-6 inline">
                    <div class="flex-1">
                        <a href="#">
                            <p class="text-sm leading-6 font-medium text-gray-500">
                                {{ __('frontPage.Terms Privacy Policy Cookies Imprint Ads info') }}
                            </p>
                        </a>
                    </div>
                    <div class="flex-2">
                        <p class="text-sm leading-6 font-medium text-gray-600">
                            {{ __('frontPage.© 2020 Twitter, Inc.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
    <script>
        var firebaseConfig = {

            apiKey: "AIzaSyDR6TqI2WLAVfIvZNtdlcudq5MawBwF8hE",
            authDomain: "twitter-bbed3.firebaseapp.com",
            projectId: "twitter-bbed3",
            storageBucket: "twitter-bbed3.appspot.com",
            messagingSenderId: "945923383380",
            appId: "1:945923383380:web:0021361abaed4cc5334dc1",
            measurementId: "G-2C7CJ31V8H"

        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function startFCM() {
            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(response) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('store.token') }}',
                        type: 'POST',
                        data: {
                            token: response,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: 'JSON',
                        success: function(response) {

                        },
                        error: function(error) {
                            alert(error);
                        },
                    });
                }).catch(function(error) {
                    alert(error);
                });
        }
        startFCM();
        messaging.onMessage(function(payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(title, options);
        });

        $(document).on('click', '.submit', function() {
            const post_id = $(this).data('post-id');
            const button = $(this);
            $.ajax({

                url: '{{ route('posts.likes') }}',
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    'post_id': post_id
                },
                success: function(response) {
                    console.log(response);
                    button.parent().find('.like_count').text(response.count)

                    if (response.isLike == 1) {
                        button.css("color", "red");
                    } else {
                        button.css("color", "white");
                    }

                },

            })
        })
        $(document).on('click', '.submit1', function() {
            const post_id = $(this).data('post-id');
            const button = $(this);
            $.ajax({

                url: '{{ route('posts.retweets') }}',
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    'post_id': post_id
                },
                success: function(response) {

                    button.parent().find('.retweet_count').text(response.count)

                    if (response.isRetweet == 1) {
                        button.css("color", "green");
                    } else {
                        button.css("color", "white");
                    }

                },

            })
        })
    </script>
</body>

</html>
