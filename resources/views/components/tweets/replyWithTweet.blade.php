<div class="user-replies bg-white mb-6 mt-7 p-4 flex items-start border border-gray-200 rounded-lg shadow-md">
    <img class="tweet-image w-16 h-16 rounded-full"
        src="{{ asset('upload/users/users.png') }}"alt="{{ $reply->name }}" style="border-radius: 50%">


    <div class="reply-content flex-1 pl-4 ml-4">

        <div class="reply-timestamp font-semibold">
            <p class="inline-block">{{ $reply->user->name }}</p>
            <p class="inline-block">@ {{ $reply->user->nick }}</p>
            <p class="inline-block text-gray-400 text-sm font-light ml-4">{{ $reply->created_at }}</p>
        </div>

        <div class="reply-messagecom text-lg mt-2">
            {{ $reply->message }}
        </div>

        <div class="reply-tweet">
            <div class="user-tweets bg-white mb-6 mt-7 p-4 flex items-start ">
                <a href="{{ route('user.profile', ['user' => $reply->user]) }}"><img class="tweet-image w-16 h-16 rounded-full"
                        src="{{ asset('upload/users/users.png') }}"alt="{{ $reply->name }}"
                        style="border-radius: 50%"></a>


                <div class="tweet-content flex-1 pl-4 ml-4">

                    <div class="tweet-timestamp font-semibold">
                        <p class="inline-block">{{ $reply->tweets->user->name }}</p>
                        <p class="inline-block">@ {{ $reply->tweets->user->nick }}</p>
                        <p class="inline-block text-gray-400 text-sm font-light ml-4">
                            {{ $reply->tweets->created_at }}</p>
                    </div>

                    <div class="tweet-messagecom text-lg mt-2">
                        <em class="italic">{{ $reply->tweets->message }}</em>
                    </div>


                    <div class="tweet-actions flex justify-between">
                        <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full "
                            href="{{ route('replies.create', ['tweet' => $reply->tweets->id]) }}">
                            Contestar
                        </a>

                        <div class="flex justify-end">
                            @if (auth()->check())
                                @if ($reply->tweets->user_id == auth()->user()->id)
                                    <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full"
                                        href="{{ route('tweets.edit', ['tweet' => $reply->tweets->id]) }}">
                                        Editar
                                    </a>
                                    <a class="link-underline link-underline-opacity-0 ml-2 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full"
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
