@extends('layouts.app')
@section('content')
<ul><li>
    <div class="flex">
        <div class="flex-1 m-2">
            <p class="px-4 py-2 text-xl w-48 font-semibold text-white">Twittes with Hashtag: #{{ $hashtag }}</p>
        </div>    
    </div>
</li>
</ul>
<ul>
   
        <li>
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
        
        </li>
    </ul>
@endsection

