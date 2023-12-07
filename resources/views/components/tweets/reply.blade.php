<div class="container mt-5 lg:mx-auto lg:w-8/12">
    <div class="reply bg-white mb-8 p-4 flex border border-gray-200 rounded-lg w-11/12 ml-auto shadow-md">

        <a href="{{ route('user.profile', ['user' => $reply->user->id]) }}"><img class="reply-image w-16 h-16 rounded-full hover:scale-110" src="{{ asset('upload/users/users.png') }}"alt="{{ $reply->tweets->name }}"></a>

        <div class="reply-content ml-4 w-11/12">

            <div class="flex justify-between mb-2">
                <span class="flex gap-2">
                    @if ($reply->user_id != null)
                        <strong><a class="hover:text-violet-600"
                                href="{{ route('user.profile', ['user' => $reply->user->id]) }}">{{ $reply->user->name }}</a></strong>
                        <strong class="text-gray-400">{{'@'}}{{$reply->user->nick }}</strong>
                    @endif
                </span>
                <span class="text-gray-700">
                    {{ $reply->created_at->diffForHumans() }}
                </span>
            </div>

            <div class="reply-message text-lg mt-2">
                {{ $reply->message }}
            </div>

            <div class="reply-actions flex justify-between">
                <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full hover:bg-violet-600 hover:text-white"
                    href="{{ route('replies.create', ['tweet' => $reply->tweets->id]) }}">
                    Contestar
                </a>

                <div class="flex justify-end">
                    @if (auth()->check())
                        @if ($reply->user_id == auth()->user()->id)
                            <a class="link-underline link-underline-opacity-0 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full hover:bg-violet-600 hover:text-white"
                            href="{{ route('replies.edit', ['reply' => $reply->id]) }}">
                            Editar
                            </a>
                            <a class="link-underline link-underline-opacity-0 ml-2 text-violet-500 p-1 mt-2 border border-gray-200 rounded-full hover:bg-violet-600 hover:text-white"
                            href="{{ route('replies.delete', ['reply' => $reply->id]) }}">
                            Eliminar
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
