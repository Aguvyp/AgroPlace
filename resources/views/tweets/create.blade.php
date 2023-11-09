<h1>¿Qué está pensando?</h1>

{{-- Esta vista nos muestra como crear un tweet --}}

<form action="{{route('tweets.store')}}" method="POST">
    @csrf {{-- Llamo al middleware VerifyCSRF para que me compare los tokens y no me rebote con pagina expirada --}}
    <input name="tweet">
    <button type="submit">Enviar</button>
</form>

<p><a href="{{ route('tweets')}}">Volver</a></p>
