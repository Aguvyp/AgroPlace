<div class="container mt-5 lg:mx-auto lg:w-8/12">
    <div class="tweet bg-white mb-8 p-4 flex items-start border border-gray-200 rounded-lg shadow-md">


        <a href="{{ route('user.profile', ['user' => $tweet->user->id]) }}"><img
                class="tweet-image w-16 h-16 rounded-full"
                src="{{ asset('upload/users/users.png') }}"alt="{{ $tweet->name }}" style="border-radius: 50%"></a>


        <div class="tweet-content ml-4 w-11/12">

            <div class="tweet-timestamp ">
                @if ($tweet->user != null)
                    <a href="{{ route('user.profile', ['user' => $tweet->user->id]) }}"><p class="inline-block"><strong>{{ $tweet->user->name }}</strong></p></a>
                    <p class="inline-block"><strong>{{'@'}}{{ $tweet->user->nick }}</strong></p>
                    <p class="inline-block text-gray-400 text-sm font-light ml-4">{{ $tweet->created_at }}</p>
                @endif
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
                            <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full"
                                href="{{ route('tweets.edit', ['tweet' => $tweet->id]) }}">
                                Editar
                            </a>
                            <a class="link-underline link-underline-opacity-0 ml-2 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full"
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
