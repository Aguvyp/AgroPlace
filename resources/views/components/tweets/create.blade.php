{{-- Con este formulario creo los tweets desde el index --}}
<div class="container-lg mt-5 lg:mx-auto lg:w-8/12">
    <form action="{{ route('tweets.store') }}" method="POST" class="container bg-white p-7 border border-gray-200 rounded-lg">
        @csrf
            <h2>¿En qué andas?</h2>

            <input name="tweet" value="{{ old('tweet') }}"  class="container mx-auto mb-4 border border-gray-200 rounded-lg" style="height: 4rem">

            @error('tweet')
                <div role="alert">
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mb-2">{{ $message }}</div>
                </div>
            @enderror

            <div class="container d-flex gap-4 flex justify-end">
                <a href="{{ route('tweets') }}" class="btn px-4 py-2 ml-4 bg-white-400 rounded-lg w-auto">Cancelar</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 w-auto border rounded-lg text-white">Publicar</button>
            </div>
    </form>
</div>
