@extends('layouts.app')
@section('content')
    <div class="mb-6">
        <p class="text-2xl font-bold text-justify text-white">Edit Profile</p>
    </div>

    <form method="post" action="{{ route('users.post', auth()->user()) }}">
        @csrf
        @method('put')
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-white ">Name</label>
            <input type="name" id="name" name="name" placeholder="Name" value="{{ auth()->user()->name }}"
                class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="username" class="block mb-2 text-sm font-medium text-white">UserName</label>
            <input type="username" id="username" name="username" placeholder="UserName"
                value="{{ auth()->user()->username }}"class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-white">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" value="{{ auth()->user()->email }}"
                class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
            <input type="password" id="password" name="password" placeholder="password"
                value="{{ auth()->user()->password }}"
                class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-white">Password
                again</label>
            <input type="password" id="password" name="password_confirmation"
                placeholder="confirmation password"value="{{ auth()->user()->password }}"
                class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        @error('password_confirmation')
            <div>{{ $message }}</div>
        @enderror
        <div>
            <button type="submit" value="Update"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
        </div>



    </form>
@endsection
