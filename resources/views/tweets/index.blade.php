<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweets
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row">
                    <div class="col-8 offset-4">


                        @if ($notify_tweet_published)
                            <div class="alert alert-success" role="alert">
                                Tu tweet ha sido publicado
                            </div>
                        @endif

                        @if ($notify_tweet_updated)
                            <div class="alert alert-success" role="alert">
                                Tu tweet ha sido actualizado
                            </div>
                        @endif

                        @if ($notify_tweet_deleted)
                            <div class="alert alert-danger" role="alert">
                                Tu tweet ha sido eliminado
                            </div>
                        @endif


                        <p class="mb-4 flex justify-end ">
                            <a href="{{ route('tweets.create') }}" class="btn btn-primary" style="background: #7749F8;">
                                Publicá tu tweet
                            </a>
                        </p>

                        @foreach ($tweets as $tweet)
                            <div class="tweet bg-white mb-4 p-4 flex flex-row ">

                                <img class="tweet-image basis-1/4 me-4"
                                    src="{{ asset('upload/users/users.png') }}"alt="{{ $tweet->name }}"
                                    style="border-radius: 50%">

                                <div class="tweet-content basis-3/4">

                                    <div class="tweet-timestamp">
                                        {{ $tweet->created_at }}
                                    </div>

                                    <div class="tweet-messagecom">
                                        @if ($tweet->user != null)
                                            <strong>{{ $tweet->user->name }}:</strong>
                                        @endif
                                        {{ $tweet->message }}
                                    </div>

                                    <div class="tweet-actions flex justify-between w-28">
                                        <a class="link-underline link-underline-opacity-0"
                                            href="{{ route('replies.create', ['tweet' => $tweet->id]) }}">
                                            Contestar
                                        </a>

                                        <div class="flex justify-end">
                                            @if (auth()->check())
                                                @if ($tweet->user_id == auth()->user()->id)
                                                    <a class="link-underline link-underline-opacity-0"
                                                        href="{{ route('tweets.edit', ['tweet' => $tweet->id]) }}">
                                                        Editar
                                                    </a>
                                                    <a class="link-underline link-underline-opacity-0 ps-4"
                                                        href="{{ route('tweets.delete', ['tweet' => $tweet->id]) }}">
                                                        Eliminar
                                                    </a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-8 offset-6">
                                @if ($tweet->replies)
                                    @foreach ($tweet->replies as $reply)
                                        <div class="reply bg-white mb-4 p-4 flex flex-row ">
                                            <div class="tweet-content basis-3/4">
                                                <div class="tweet-reply">
                                                    Respuesta:{{ $reply->message }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
