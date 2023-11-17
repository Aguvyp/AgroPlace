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

        <h1>¿Qué está pensando?</h1>

        {{-- Esta vista nos muestra como crear un tweet --}}

        @if ($errors -> any())
            <div>Hubo un error, revisa los campos</div>
        @endif


        <form action="{{route('tweets.store')}}" method="POST">
            @csrf {{-- Llamo al middleware VerifyCSRF para que me compare los tokens y no me rebote con pagina expirada --}}

            <div>
                <label>Tweet:</label>
                <input name="tweet" value="{{old('tweet')}}">
                @error('tweet')
                        <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label>Tu nombre:</label>
                <input name="name" value="{{old('name')}}">
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <hr>
            <button type="submit">Enviar</button>
        </form>

        <p><a href="{{ route('tweets')}}">Volver</a></p>
    </body>
</html>
