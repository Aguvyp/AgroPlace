<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <nav class="navbar navbar-expand-lg" style="background-color: #343A40; padding:16px 72px 11px 72px;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color:#FFFFFF;" href="{{ route('tweets')}}">Twitter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" style="color: #FFFFFF;" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="color: #ABB5BE;" href="#">Acerca de</a>
                </li>
              </ul>
          </div>
        </div>
      </nav>

    <body class="antialiased" style="background: #E7E7E7;">
        <div>
            <h1>Twitter</h1>

            <p><a href="{{ route('tweets.create')}}">Publicá tu tweet</a></p>

            @foreach( $tweets as $tweet )

            <div>
                {{ $tweet->message }}
                <br>
                <small>&gt; {{ $tweet->autor }}</small>
                <br>
                <a href="{{ route('tweets.edit', ['tweet' => $tweet->id])}}">
                    Editar tweet
                </a>

                <form action="{{ route('tweets.destroy', ['tweet' => $tweet->id]) }}" method="POST">
                    @csrf
                    @method('delete');
                    <button onclick="return confirm ('Desea borrar el registro {{$tweet->id}}')" type="submit">Eliminar tweet</button>
                </form>
                <hr>
            </div>

        @endforeach
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </body>
</html>
