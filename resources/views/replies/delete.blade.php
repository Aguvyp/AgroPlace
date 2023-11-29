<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweets
        </h2>
    </x-slot>

    <div class="container-lg mt-5 lg:mx-auto lg:w-8/12">
        <form action="{{ route('replies.destroy', ['reply' => $reply->id]) }}" method="POST" class="container bg-white p-7 border border-gray-200 rounded-lg">
            @csrf
            @method('DELETE')
            <h2 class="mb-4"><strong>Vas a eliminar tu respuesta a:</strong></h2>
            <div class="mb-4">
                <em>Texto del tweet</em>
            </div>
            <textarea class="container mb-4 border border-gray-200 rounded-lg  w-11/12 ml-20" style="resize: none">{{$reply->message}}</textarea>

            @error('tweet')
                <div role="alert">
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mb-2">
                    {{$message}}
                    </div>
                </div>
            @enderror

            <div class="container d-flex gap-4 flex justify-end">
                <a href="{{ route('tweets') }}" class="btn px-4 py-2 ml-4 bg-white-400 rounded-lg w-auto ">Cancelar</a>
                <button type="submit"
                    class="px-4 py-2 bg-red-600 w-auto border rounded-lg text-white">Eliminar</button>
            </div>
        </form>
    </div>
</x-app-layout>