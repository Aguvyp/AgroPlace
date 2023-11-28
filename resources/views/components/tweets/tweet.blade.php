<div class="container mt-5 lg:mx-auto lg:w-8/12">

    <div class="tweet bg-white mb-8 p-4 flex items-start border border-gray-200 rounded-lg shadow-md">


        <img class="tweet-image w-16 h-16 rounded-full"
            src="{{ asset('upload/users/users.png') }}"alt="{{ $tweet->name }}" style="border-radius: 50%">


        <div class="tweet-content flex-1 pl-4 ml-4">

            <div class="tweet-timestamp">
                @if ($tweet->user != null)
                    <strong class="mr-2">{{ $tweet->user->name }}</strong>
                @endif
                {{ $tweet->created_at }}
            </div>

            <div class="tweet-messagecom text-lg mt-2">
                {{ $tweet->message }}
            </div>

            <div class="tweet-actions flex justify-between">
                <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full "
                    href="{{ route('replies.create', ['tweet' => $tweet->id]) }}">
                    Contestar
                </a>

                <div class="flex justify-end">
                    @if (auth()->check())
                        @if ($tweet->user_id == auth()->user()->id)
                            <a class="link-underline link-underline-opacity-0 text-violet-500"
                                href="{{ route('tweets.edit', ['tweet' => $tweet->id]) }}">
                                Editar
                            </a>
                            <a class="link-underline link-underline-opacity-0 ps-4 text-violet-500"
                                href="{{ route('tweets.delete', ['tweet' => $tweet->id]) }}">
                                Eliminar
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>




    @if ($tweet->replies)
        @foreach ($tweet->replies as $reply)
            <div class="reply bg-white mb-8 p-4 flex border border-gray-200 rounded-lg w-11/12 ml-auto shadow-md">

                <img class="reply-image w-16 h-16 rounded-full" src="{{ asset('upload/users/users.png') }}"alt="{{ $tweet->name }}">

                <div class="reply-content ml-4">

                    <div class="reply-timestamp">
                        {{ $reply->created_at }}
                    </div>

                    <div class="reply-message text-lg mt-2">
                        @if ($reply->user != null)
                            <strong>{{ $reply->user->name }}:</strong>
                        @endif
                        {{ $reply->message }}
                    </div>


                    <div class="reply-actions flex justify-start">
                        @if (auth()->check())
                            @if ($reply->user_id == auth()->user()->id)
                                <a class="link-underline link-underline-opacity-0 text-violet-500"
                                    href="{{ route('tweets.edit', ['tweet' => $tweet->id]) }}">
                                    Editar
                                </a>
                                <a class="link-underline link-underline-opacity-0 ps-4 text-violet-500"
                                    href="{{ route('tweets.delete', ['tweet' => $tweet->id]) }}">
                                    Eliminar
                                </a>
                            @endif
                        @endif
                    </div>


                </div>
            </div>
        @endforeach
    @endif
</div>
