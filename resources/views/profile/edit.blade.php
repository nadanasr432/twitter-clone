@extends('layouts.app')
@section('content')
    <h1>Edit Profile</h1>
    <br>

    <form class="form-horizontal" method="post" action="{{ route('users.post', auth()->user()) }}">
        @csrf
        @method('put')
        <div>
            <label for="name">Name</label>
            <input type="name" id="name" name="name" placeholder="Name" value="{{ auth()->user()->name }}">

        </div>
        <div>
            <label for="username">UserName</label>
            <input type="username" id="username" name="username" placeholder="UserName"
                value="{{ auth()->user()->username }}">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" value="{{ auth()->user()->email }}">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="password"
                value="{{ auth()->user()->password }}">
        </div>


        <div>
            <label for="password_confirmation">Password again</label>
            <input type="password" id="password" name="password_confirmation"
                placeholder="confirmation password"value="{{ auth()->user()->password }}">
        </div>
        @error('password_confirmation')
            <div>{{ $message }}</div>
        @enderror


        <div>

            <input type="submit" value="Update">
        </div>



    </form>
@endsection
