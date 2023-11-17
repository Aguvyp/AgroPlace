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

        <h1>Edita tu Tweet #{{ $tweet->id}}</h1>

        {{-- Esta vista nos muestra como crear un tweet --}}

        @if ($errors -> any())
            <div>Hubo un error, revisa los campos</div>
        @endif


        <form action="{{ route('tweets.update', ['tweet' => $tweet->id]) }}" method="POST">
            @csrf {{-- Llamo al middleware VerifyCSRF para que me compare los tokens y no me rebote con pagina expirada --}}
            @method('put'); {{-- Sobreescribe el metodo del formulario --}}

            <div>
                <label>Tweet:</label>
                <input name="tweet" value="{{$tweet->message}}">
                @error('tweet')
                        <div>{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Enviar</button>
        </form>

        <p><a href="{{ route('tweets')}}">Volver</a></p>
    </body>
</html>
