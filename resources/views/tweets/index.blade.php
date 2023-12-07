<x-app-layout>

    <x-slot name="header">
        <a href="{{ route('tweets') }}">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center" style="text-shadow: 2px 2px 4px rgba(160, 12, 228, 0.767);">
                T A L K I N G
            </h2>
        </a>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if ($notify_tweet_published == true)
            <div role="alert">
                <div
                    class="border border-green-400 rounded-lg bg-green-100 px-4 py-3 text-green-700 mt-5 lg:mx-auto lg:w-8/12">
                    <p>Tu tweet se ha publicado!.</p>
                </div>
            </div>
        @endif

        @if ($notify_tweet_updated == true)
            <div role="alert">
                <div
                    class="border border-blue-400 rounded-lg bg-blue-100 px-4 py-3 text-blue-700 mt-5 lg:mx-auto lg:w-8/12">
                    <p>Tu tweet se ha actualizado!.</p>
                </div>
            </div>
        @endif

        @if ($notify_tweet_deleted == true)
            <div role="alert">
                <div
                    class="border border-red-400 rounded-lg bg-red-100 px-4 py-3 text-red-700 mt-5 lg:mx-auto lg:w-8/12">
                    <p>Tu tweet se ha borrado!.</p>
                </div>
            </div>
        @endif

        {{-- Alerts para las respuestas --}}
        @if ($notify_reply_published == true)
            <div role="alert">
                <div
                    class="border border-green-400 rounded-lg bg-green-100 px-4 py-3 text-green-700 mt-5 lg:mx-auto lg:w-8/12">
                    <p>Tu respuesta se ha publicado!.</p>
                </div>
            </div>
        @endif

        @if ($notify_reply_updated == true)
            <div role="alert">
                <div
                    class="border border-blue-400 rounded-lg bg-blue-100 px-4 py-3 text-blue-700 mt-5 lg:mx-auto lg:w-8/12">
                    <p>Tu respuesta se ha actualizado!.</p>
                </div>
            </div>
        @endif

        @if ($notify_reply_deleted == true)
            <div role="alert">
                <div
                    class="border border-red-400 rounded-lg bg-red-100 px-4 py-3 text-red-700 mt-5 lg:mx-auto lg:w-8/12">
                    <p>Tu respuesta se ha borrado!.</p>
                </div>
            </div>
        @endif

        @auth
            <x-tweets.create>
            </x-tweets.create>
        @endauth

        @guest
            <div class="flex bg-white justify-center mt-4 border border-gray-200 rounded-lg shadow-md mt-5 lg:mx-auto lg:w-8/12 items-center"
                style="height: 4rem">
                <p>Debes <a href="{{ route('login') }}" class="text-blue-400">iniciar sesión</a> para publicar tweets</p>
            </div>
        @endguest

        @foreach ($tweets as $tweet)
            <x-tweets.tweet :tweet="$tweet">
            </x-tweets.tweet>

            @foreach ($tweet->replies as $reply)
                <x-tweets.reply :reply="$reply">
                </x-tweets.reply>
            @endforeach
        @endforeach
    </div>
</x-app-layout>
