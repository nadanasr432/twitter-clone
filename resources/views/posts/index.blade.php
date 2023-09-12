@extends('layouts.app')
@section('content')
    <div class="flex">
        <div class="flex-1 m-2">
            <h2 class="px-4 py-2 text-xl font-semibold text-white">{{ __('frontPage.Home') }}</h2>
        </div>
        <div class="flex-1 px-4 py-2 m-2">
            <div class="flex-1 px-4 py-2 m-2">

                <ul>
                    <div class="flex">
                        <div class="flex-1 m-2">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">{{ __('frontPage.Language') }}({{ $locale }})<svg
                                    class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow  dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href={{ route('setLang', 'en') }}
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('frontPage. English') }}</a>
                                    </li>
                                    <li>
                                        <a href={{ route('setLang', 'ar') }}
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('frontPage. Arabic') }}</a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </ul>
            </div>
        </div>

    </div>

    <hr class="border-gray-600">
    <!--middle creat tweet-->
    <div class="flex">
        <div class="m-2 w-10 py-1">

            <img class="inline-block h-10 w-10 rounded-full" src="{{ auth()->user()->avatar_url }}" alt="">

        </div>
        @auth
            <form action="{{ route('posts') }}" method="post" class="mb-4" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="flex-1 px-2 pt-2 mt-2">
                    <textarea name="body" id="body" class=" bg-transparent text-gray-400 font-medium text-lg w-full" rows="2"
                        cols="50" placeholder={{ __("frontPage.What's happening?") }}></textarea>

                </div>
                <!--middle creat tweet below icons-->
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

                            <div class="flex-1 text-center py-2 m-2">
                                <a href="#"
                                    class="mt-1 group flex items-center text-blue-400 px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                                    <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1">
                        <button type="submit"
                            class="bg-blue-400 mt-5 hover:bg-blue-600 text-white font-bold py-2 px-8 rounded-full mr-8 float-right">
                            {{ __('frontPage.Tweet') }}
                        </button>



                    </div>

                </div>
            </form>
        @endauth
    </div>
    <div>
        @if ($posts->count())
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
            {{-- {{ $posts->links() }}  --}}
        @else
            <p>There are no posts</p>
        @endif

        <hr class="border-blue-800 border-4">
    </div>
@endsection
@section('users')
    <div class="flex">
        <div class="flex-1 m-2">
            <h2 class="px-4 py-2 text-xl w-48 font-semibold text-white">Who to follow</h2>
        </div>
    </div>


    <hr class="border-gray-600">

    <!--first person who to follow-->

    @php
        $users = App\Models\User::all()->except(Auth::id());
    @endphp
    @if ($users->count())
        @foreach ($users as $user)
            <x-followers :user="$user" />

            <hr class="border-gray-600">
        @endforeach
    @endif

    <!--show more-->

    <div class="flex">
        <div class="flex-1 p-4">
            <h2 class="px-4 ml-2 w-48 font-bold text-blue-400">Show more</h2>
        </div>
    </div>
@endsection
