<x-app-layout>

    <x-slot name="header">
        <label class="font-semibold text-gray-800 leading-tight text-base">
            Perfil de {{ $user->name }}
        </label>
    </x-slot>


    <div class="container mt-5 lg:mx-auto lg:w-8/12">

        <div class="user mb-8 mt-24 p-4 flex items-start">


            <img class="tweet-image w-24 rounded-full"
                src="{{ asset('upload/users/users.png') }}" alt="{{ $user->name }}">


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
        @if ($user->tweets)
            @foreach ($latestTweets as $user_tweet)
                <div
                    class="user-tweets bg-white mb-6 mt-7 p-4 flex items-start border border-gray-200 rounded-lg shadow-md">
                    <img class="tweet-image w-16 h-16 rounded-full"
                            src="{{ asset('upload/users/users.png') }}"alt="{{ $user_tweet->name }}"
                            style="border-radius: 50%">


                    <div class="tweet-content flex-1 pl-4 ml-4">

                        <div class="tweet-timestamp font-semibold">
                            <p class="inline-block">{{ $user_tweet->user->name }}</p>
                            <p class="inline-block ml-1">@ {{ $user_tweet->user->nick }}</p>
                            <p class="inline-block text-gray-400 text-sm font-light ml-4">{{ $user_tweet->created_at }}</p>
                        </div>

                        <div class="tweet-messagecom text-lg mt-2">
                            {{ $user_tweet->message }}
                        </div>


                        <div class="tweet-actions flex justify-between">
                            <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full "
                                {{-- href="{{ route('replies.create', ['tweet' => $tweet->id]) }}" --}}>
                                Contestar
                            </a>

                            <div class="flex justify-end">
                                @if (auth()->check())
                                    {{-- @if ($tweet->user_id == auth()->user()->id) --}}
                                        <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full"
                                            {{-- href="{{ route('tweets.edit', ['tweet' => $tweet->id]) }}" --}}>
                                            Editar
                                        </a>
                                        <a class="link-underline link-underline-opacity-0 ml-2 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full"
                                            {{-- href="{{ route('tweets.delete', ['tweet' => $tweet->id]) }}" --}}>
                                            Eliminar
                                        </a>
                                    {{-- @endif --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <h2 class="mt-16 text-xl font-semibold">Últimos 10 comentarios de @ {{ $user->nick }}</h2>
        @if ($user->replies)
            @foreach ($latestReplies as $user_replies)
                <div
                    class="user-replies bg-white mb-6 mt-7 p-4 flex items-start border border-gray-200 rounded-lg shadow-md">
                    <img class="tweet-image w-16 h-16 rounded-full"
                            src="{{ asset('upload/users/users.png') }}"alt="{{ $user_replies->name }}"
                            style="border-radius: 50%">


                    <div class="reply-content flex-1 pl-4 ml-4">

                        <div class="reply-timestamp font-semibold">
                            <p class="inline-block">{{ $user_replies->user->name }}</p>
                            <p class="inline-block">@ {{ $user_replies->user->nick }}</p>
                            <p class="inline-block text-gray-400 text-sm font-light ml-4">{{ $user_replies->created_at }}</p>
                        </div>

                        <div class="reply-messagecom text-lg mt-2">
                            {{ $user_replies->message }}
                        </div>

                        <div class="reply-tweet">
                            <div
                                class="user-tweets bg-white mb-6 mt-7 p-4 flex items-start ">
                                <a href="{{-- {{route('user.profile', ['user' => $user])}} --}}"><img class="tweet-image w-16 h-16 rounded-full"
                                        src="{{ asset('upload/users/users.png') }}"alt="{{ $user_tweet->name }}"
                                        style="border-radius: 50%"></a>


                                <div class="tweet-content flex-1 pl-4 ml-4">

                                    <div class="tweet-timestamp font-semibold">
                                        <p class="inline-block">{{ $user_replies->tweets->user->name }}</p>
                                        <p class="inline-block">@ {{ $user_replies->tweets->user->nick }}</p>
                                        <p class="inline-block text-gray-400 text-sm font-light ml-4">{{ $user_replies->tweets->created_at }}</p>
                                    </div>

                                    <div class="tweet-messagecom text-lg mt-2">
                                        <em class="italic">{{ $user_replies->tweets->message }}</em>
                                    </div>


                                    <div class="tweet-actions flex justify-between">
                                        <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full "
                                            {{-- href="{{ route('replies.create', ['tweet' => $tweet->id]) }}" --}}>
                                            Contestar
                                        </a>

                                        <div class="flex justify-end">
                                            @if (auth()->check())
                                                {{-- @if ($tweet->user_id == auth()->user()->id) --}}
                                                    <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full"
                                                        {{-- href="{{ route('tweets.edit', ['tweet' => $tweet->id]) }}" --}}>
                                                        Editar
                                                    </a>
                                                    <a class="link-underline link-underline-opacity-0 ml-2 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full"
                                                        {{-- href="{{ route('tweets.delete', ['tweet' => $tweet->id]) }}" --}}>
                                                        Eliminar
                                                    </a>
                                                {{-- @endif --}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        @endif




</x-app-layout>
