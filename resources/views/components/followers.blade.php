@props(['user'])

{{-- <ul class="flex flex-col divide-y w-full">
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

                </div>

            </div>
        </div>
        <div class="text-gray-600 dark:text-gray-200 text-xs">
            <div class="flex flex-col text-right">

                @if (!auth()->user()->isFollowing($user))
                    <form action="{{ route('profile.follower', $user) }}" method="post">
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
    </li>

</ul> --}}
<ul class="flex flex-col divide-y w-full">
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
                @if (auth()->user()->isFollowing($user))

                    <form action="{{ route('profile.follower', $user) }}" method="post" class=" float-right">
                        @csrf
                        <button type="submit"
                            class="bg-transparent hover:bg-blue-500 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded-full">
                            unfollow
                        </button>
                    </form>
                @else
                    @if (auth()->user()->requests()->where('following_id', $user->id)->exists())
                        <form action="{{ route('profile.follower', $user) }}" method="post" class=" float-right">
                            @csrf
                            <button type="submit"
                                class="bg-transparent hover:bg-blue-500 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded-full">
                                pending
                            </button>
                        </form>
                    @else
                        <form action="{{ route('profile.follower', $user) }}" method="post" class=" float-right">
                            @csrf
                            <button type="submit"
                                class="bg-transparent hover:bg-blue-500 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded-full">
                                Follow
                            </button>
                        </form>
                    @endif

                @endif

            </div>

            <hr class="border-gray-600">
    </li>

</ul>
