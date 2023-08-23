@extends('layouts.app')
@section('content')
    <div class="flex flex-shrink-0 p-4 pb-0">

        <div>

            {{-- @foreach (Auth::user()->followers as $follower){
                echo $follower->name;
                } --}}
            @if ($users->count())
                @foreach ($users as $user)
                    <x-followers :user="$user"></x-followers>
                @endforeach
                {{-- {{ $users->links() }} --}}
            @else
                <p>There are no users</p>
            @endif
        </div>
    </div>
@endsection
