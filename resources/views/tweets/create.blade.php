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
