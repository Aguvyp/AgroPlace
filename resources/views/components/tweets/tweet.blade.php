<div class="container mt-5 lg:mx-auto lg:w-8/12">
    <div class="tweet bg-white mb-8 p-4 flex items-start border border-gray-200 rounded-lg shadow-md">


        <a href="{{ route('user.profile', ['user' => $tweet->user->id]) }}">
            @if ($tweet->user->image)
                <img class="tweet-image w-16 h-16 rounded-full hover:scale-110"
                    src="{{ asset('storage/' . $tweet->user->image) }}" alt="{{ $tweet->name }}" style="border-radius: 50%">
                </a>
             @else
                <img class="tweet-image w-16 h-16 rounded-full hover:scale-110"
                src="{{ asset('upload/users/users.png') }}"alt="{{ $tweet->name }}" style="border-radius: 50%">
                </a>
            @endif
        </a>

        <div class="tweet-content ml-4 w-11/12">

            <div class="flex justify-between mb-2">
                <span class="flex gap-2">
                    @if ($tweet->user_id != null)
                        <strong><a class="hover:text-violet-600"
                                href="{{ route('user.profile', ['user' => $tweet->user->id]) }}">{{ $tweet->user->name }}</a></strong>
                        <strong class="text-gray-400">{{ '@' }}{{ $tweet->user->nick }}</strong>
                    @endif
                </span>
                <span class="text-gray-700">
                    {{ $tweet->created_at->diffForHumans() }}
                </span>
            </div>

            <div class="tweet-messagecom text-lg mt-2">
                {{ $tweet->message }}
            </div>

            <div class="tweet-actions flex justify-between">
                <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full hover:bg-violet-600 hover:text-white"
                    href="{{ route('replies.create', ['tweet' => $tweet->id]) }}">
                    Contestar
                </a>

                <div class="flex justify-end">
                    @if (auth()->check())
                        @if ($tweet->user_id == auth()->user()->id)
                            <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full hover:bg-violet-600 hover:text-white"
                                href="{{ route('tweets.edit', ['tweet' => $tweet->id]) }}">
                                Editar
                            </a>
                            <a class="link-underline link-underline-opacity-0 ml-2 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full hover:bg-violet-600 hover:text-white"
                                href="{{ route('tweets.delete', ['tweet' => $tweet->id]) }}">
                                Eliminar
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
