<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>

    <body class="antialiased">
        <div>
            <h1>Twitter</h1>

            <p><a href="{{ route('tweets.create')}}">Publicá tu tweet</a></p>

            @foreach( $tweets as $tweet )
            <div>
                {{ $tweet->message }}
                <br>
                <small>&gt; {{ $tweet->name }}</small>
                <small>&gt; {{ $tweet->name }}</small> |
                <a href="{{ route('tweets.edit', ['tweet' => $tweet->id])}}">
                    Editar tweet
                </a>
                <hr>
            </div>
        @endforeach
        </div>
    </body>
</html>
