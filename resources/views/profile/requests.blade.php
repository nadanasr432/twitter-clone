@extends('layouts.app')
@section('content')
    @if (count(auth()->user()->requests) > 0)
        <p>{{ __('frontPage.Total follow requests') }}: {{ $users->count() > 0 }}</p>

        <ul class="flex flex-col divide-y w-full">
            @foreach (auth()->user()->requests as $user)
                <li class="flex flex-row">

                    <div class="flex flex-shrink-0">
                        <div class="flex-1 ">
                            <div class="flex items-center w-48">
                                <div>
                                    <img class="inline-block h-10 w-auto rounded-full ml-4 mt-2" src="{{ $user->avatar_url }}"
                                        alt="">
                                </div>
                                <div class="ml-3 mt-3">
                                    <p class="text-base leading-6 font-medium text-white">
                                        {{ $user->name }}
                                    </p>
                                    <p
                                        class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                        <span>@</span>{{ $user->username }}
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="flex-1 px-4 py-2 m-2">
                            <form action="{{ route('user.accept', $user) }}" method="post" class="float-right">
                                @csrf
                                <button type="submit"
                                    class="bg-transparent hover:bg-blue-500 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded-full">
                                    {{ __('frontPage.Accept') }}
                                </button>
                            </form>

                        </div>

                        <hr class="border-gray-600">
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>No pending follow requests.</p>
    @endif
@endsection
