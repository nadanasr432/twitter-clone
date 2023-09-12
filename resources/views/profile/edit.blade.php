@extends('layouts.app')
@section('content')
    <div class="mb-6">
        <p class="text-2xl font-bold text-justify text-white">{{ __('frontPage.Edit Profile') }}</p>
    </div>

    <form method="post" action="{{ route('users.post', auth()->user()) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-white ">{{ __('frontPage.Name') }}</label>
            <input type="name" id="name" name="name" placeholder={{ __('frontPage.Name') }}
                value="{{ auth()->user()->name }}"
                class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="username" class="block mb-2 text-sm font-medium text-white">{{ __('frontPage.UserName') }}</label>
            <input type="username" id="username" name="username" placeholder={{ __('frontPage.UserName') }}
                value="{{ auth()->user()->username }}"class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-white">{{ __('frontPage.Email') }}</label>
            <input type="email" id="email" name="email" placeholder={{ __('frontPage.Email') }}
                value="{{ auth()->user()->email }}"
                class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-white">{{ __('frontPage.Password') }}</label>
            <input type="password" id="password" name="password" placeholder={{ __('frontPage.Password') }}
                value="{{ auth()->user()->password }}"
                class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="password_confirmation"
                class="block mb-2 text-sm font-medium text-white">{{ __('frontPage.Password again') }}</label>
            <input type="password" id="password" name={{ __('frontPage.Password again') }}
                placeholder="confirmation password"value="{{ auth()->user()->password }}"
                class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        @error('password_confirmation')
            <div>{{ $message }}</div>
        @enderror



        <label>
            <input type="file" name="avatar" accept="image/*" class="hidden">
            <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                stroke="currentColor" viewBox="0 0 24 24">
                <path
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
        </label>
        <p>{{ __('frontPage.Edit Image Profile') }}</p>

        <label>
            <input type="file" name="header" accept="image/*" class="hidden">
            <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                stroke="currentColor" viewBox="0 0 24 24">
                <path
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
        </label>
        <p>Edit Header Profile</p>



        <div>
            <button type="submit" value="Update"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
        </div>



    </form>
@endsection
