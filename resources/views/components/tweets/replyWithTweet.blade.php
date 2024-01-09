<div class="user-replies bg-white mb-6 mt-7 p-4 flex items-start border border-gray-200 rounded-lg shadow-md">
    <a href="{{ route('user.profile', ['user' => $reply->user->id]) }}">
        @if ($reply->user->image)
                <img class="tweet-image w-16 h-16 rounded-full hover:scale-110"
                    src="{{ asset('storage/' . $reply->user->image) }}" alt="{{ $reply->name }}" style="border-radius: 50%">
                </a>
             @else
                <img class="tweet-image w-16 h-16 rounded-full hover:scale-110"
                src="{{ asset('upload/users/users.png') }}"alt="{{ $reply->name }}" style="border-radius: 50%">
                </a>
            @endif
    </a>


    <div class="reply-content flex-1 pl-4 ml-4">

        <div class="reply-timestamp flex justify-between">
            <span class="flex gap-2">
                @if ($reply->user_id != null)
                    <strong><a class="hover:text-violet-600"
                            href="{{ route('user.profile', ['user' => $reply->user->id]) }}">{{ $reply->user->name }}</a></strong>
                    <strong class="text-gray-400">{{'@'}}{{$reply->user->nick }}</strong>
                @endif
            </span>
            <span class="text-gray-700">
                {{ $reply->created_at->diffForHumans() }}
            </span>        </div>

        <div class="reply-messagecom text-lg mt-2">
            {{ $reply->message }}
        </div>

        <div class="reply-tweet">
            <div class="user-tweets bg-white mb-6 mt-7 p-4 flex items-start ">
                <a href="{{ route('user.profile', ['user' => $reply->tweets->user]) }}">
                    @if ($reply->tweets->user->image)
                <img class="tweet-image w-16 h-16 rounded-full hover:scale-110"
                    src="{{ asset('storage/' . $reply->tweets->user->image) }}" alt="{{ $reply->tweets->user->name }}" style="border-radius: 50%">
                </a>
             @else
                <img class="tweet-image w-16 h-16 rounded-full hover:scale-110"
                src="{{ asset('upload/users/users.png') }}"alt="{{ $reply->tweets->user->name }}" style="border-radius: 50%">
                </a>
            @endif

                <div class="tweet-content flex-1 pl-4 ml-4">

                    <div class="flex justify-between tweet-timestamp">
                        <span class="flex gap-2">
                            @if ($reply->tweets->user_id != null)
                                <strong><a class="hover:text-violet-600"
                                        href="{{ route('user.profile', ['user' => $reply->tweets->user->id]) }}">{{ $reply->tweets->user->name }}</a></strong>
                                <strong class="text-gray-400">{{'@'}}{{$reply->tweets->user->nick }}</strong>
                            @endif
                        </span>
                        <span class="text-gray-700">
                            {{ $reply->tweets->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <div class="tweet-messagecom text-lg mt-2">
                        <em class="italic">{{ $reply->tweets->message }}</em>
                    </div>


                    <div class="tweet-actions flex justify-between">
                        <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full hover:bg-violet-600 hover:text-white"
                            href="{{ route('replies.create', ['tweet' => $reply->tweets->id]) }}">
                            Contestar
                        </a>

                        <div class="flex justify-end">
                            @if (auth()->check())
                                @if ($reply->tweets->user_id == auth()->user()->id)
                                    <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full hover:bg-violet-600 hover:text-white"
                                        href="{{ route('tweets.edit', ['tweet' => $reply->tweets->id]) }}">
                                        Editar
                                    </a>
                                    <a class="link-underline link-underline-opacity-0 ml-2 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full hover:bg-violet-600 hover:text-white"
                                        href="{{ route('tweets.delete', ['tweet' => $reply->tweets->id]) }}">
                                        Eliminar
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
