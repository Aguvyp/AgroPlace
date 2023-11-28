<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweets
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray overflow-hidden shadow-sm sm:rounded-lg">

                @if ($notify_tweet_published == true)
                    <div role="alert">
                        <div class="border border-green-400 rounded-lg bg-green-100 px-4 py-3 text-green-700 mt-5 lg:mx-auto lg:w-8/12">
                            <p>Tu tweet se ha publicado!.</p>
                        </div>
                    </div>
                @endif

                @if ($notify_tweet_updated == true)
                    <div role="alert">
                        <div class="border border-blue-400 rounded-lg bg-blue-100 px-4 py-3 text-blue-700 mt-5 lg:mx-auto lg:w-8/12">
                            <p>Tu tweet se ha actualizado!.</p>
                        </div>
                    </div>
                @endif

                @if ($notify_tweet_deleted == true)
                    <div role="alert">
                        <div class="border border-red-400 rounded-lg bg-red-100 px-4 py-3 text-red-700 mt-5 lg:mx-auto lg:w-8/12">
                            <p>Tu tweet se ha borrado!.</p>
                        </div>
                    </div>
                @endif


                <x-tweets.create>
                </x-tweets.create>

                @foreach ($tweets as $tweet)
                    <x-tweets.tweet :tweet="$tweet">
                    </x-tweets.tweet>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
