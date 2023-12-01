<x-app-layout>

    <x-slot name="header">
        <label class="font-semibold text-gray-800 leading-tight text-base">
            Perfil de {{ $user->name }}
        </label>
    </x-slot>


    <div class="container mt-5 lg:mx-auto lg:w-8/12">

        <div class="user mb-8 mt-24 p-4 flex items-start">


            <img class="tweet-image w-24 rounded-full" src="{{ asset('upload/users/users.png') }}"
                alt="{{ $user->name }}">


            <div class="user-info flex-1 pl-4 ml-4">
                <div>
                    <h2 class="text-xl"><strong>Perfil de {{ $user->name }}</strong></h2>
                </div>

                <div class="mb-2">
                    @ {{ $user->nick }}
                </div>

                <div class="text-xs font-semibold mb-1">
                    {{ $user->locality }} - {{ $user->province }} - {{ $user->country }}
                </div>

                <div class="text-xs">
                    +54 9 {{ $user->phone }}
                </div>
            </div>
        </div>

        <h2 class="mt-16 text-xl font-semibold">Últimas 10 publicaciones de @ {{ $user->nick }}</h2>

    </div>



    @if ($user->tweets)
        @foreach ($latestTweets as $tweet)
            <x-tweets.tweet :tweet="$tweet">
            </x-tweets.tweet>
        @endforeach
    @endif

    <div class="container mt-5 lg:mx-auto lg:w-8/12">
        <h2 class="mt-16 text-xl font-semibold">Últimos 10 comentarios de @ {{ $user->nick }}</h2>
        @if ($user->replies)
            @foreach ($latestReplies as $reply)
                <x-tweets.replyWithTweet :reply="$reply">
                </x-tweets.replyWithTweet>
            @endforeach
        @endif
    </div>
</x-app-layout>
