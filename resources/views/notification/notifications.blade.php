@extends('layouts.app')

@section('content')

    <p class="text-sm leading-5 font-medium text-white-700 group-hover:text-white-300 transition ease-in-out duration-150">Notifications</p>

    <ul class="flex flex-col divide-y w-full">
        @foreach($notifications as $notification)
            <li class="flex flex-row">
                @if($notification->type === 'App\Notifications\LikeTweet')
                    <div class="flex flex-shrink-0">
                        <div class="flex-1">
                            <div class="flex items-center w-48">
                                <div>
                                    <img class="inline-block h-10 w-auto rounded-full ml-4 mt-2" src="" alt="">
                                </div>
                                <div class="ml-3 mt-3">
                                    <p class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                       {{ $notification->data['user']['name'] }} has liked your tweet: </p>
                                   
                                </div>
                            </div>
                            <div class="ml-3 mt-3">
                                <p class="text-sm leading-5 text-black-600 group-hover:text-black-400 transition ease-in-out duration-150">
                                    {{ $notification->data['post']['body'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @elseif($notification->type === 'App\Notifications\NewCommentNotification')
                    <div class="flex flex-shrink-0">
                        <div class="flex-1">
                            <div class="flex items-center w-48">
                                <div>
                                    <img class="inline-block h-10 w-auto rounded-full ml-4 mt-2" src="" alt="">
                                </div>
                                <div class="ml-3 mt-3">
                                    <p class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                       {{ $notification->data['user']['name'] }} commented on your tweet:
                                    </p>
                                </div>
                            </div>
                            <div class="ml-3 mt-3">
                                <p class="text-sm leading-5 text-black-600 group-hover:text-black-400 transition ease-in-out duration-150">
                                    {{ $notification->data['post']['body'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
    <script>
      
      document.addEventListener('DOMContentLoaded', function() {
   
        const notificationsLink = document.getElementById('notifications-link');
        const notificationsCountBadge = document.getElementById('notifications-count-badge');

        notificationsLink.addEventListener('click', function() {
            notificationsCountBadge.innerText = '';
        });
    });
    </script>

@endsection
