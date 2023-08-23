@extends('layouts.app')
@section('content')
    @extends('layouts.app')
@section('content')
    <ul class="flex flex-col divide-y w-full">
        <li class="flex flex-row">
            <div class="select-none cursor-pointer hover:bg-gray-50 flex flex-1 items-center p-4">
                <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                    <a href="#" class="block relative">
                        <img alt="profil"
                            src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=150&amp;q=80"
                            class="mx-auto object-cover rounded-full h-10 w-10">
                    </a>
                </div>
                <div class="flex-1 pl-1 mr-16">
                    <div class="font-medium dark:text-white">{{ $user->name }}</div>
                    <div class="text-gray-600 dark:text-gray-200 text-sm">{{ $user->username }}</div>
                </div>
                <div class="text-gray-600 dark:text-gray-200 text-xs">
                    <div class="flex flex-col text-right">

                        @if (auth()->user()->id == $user->id)
                            <a href="{{ route('profile.edit', $user) }}"
                                class="flex justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  rounded max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 hover:border-blue-800 flex items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                                Edit Profile
                            </a>
                        @elseif (!auth()->user()->isFollowing($user))
                            <form action="{{ route('profile.follower', auth()->user($user)) }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="flex justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  rounded max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 hover:border-blue-800 flex items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                                    Follow
                                </button>
                            </form>
                        @else
                            <form action="{{ route('profile.follower', $user) }}"method="post">
                                @csrf
                                <button type="submit"
                                    class="flex justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  rounded max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 hover:border-blue-800 flex items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                                    UnFollow
                                </button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </li>
    </ul>
@endsection

@endsection
