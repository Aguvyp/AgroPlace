{{-- @extends('layouts.main')
@section('body')
    <div>
        <div class="row">
            <div class="col-8 offset-2">

                <div class="edit-tittle d-flex pt-5 pb-2">
                    <h1>
                        ¿Estas seguro de eliminar tu Tweet?
                    </h1>
                </div>


                <div class="edit bg-white mt-0.4 p-4 d-flex w-100">
                    <div class="edit-content w-100">

                        @if ($errors->any())
                            <div>Hubo un error, revisa los campos</div>
                        @endif


                        <form action="{{ route('tweets.destroy', ['tweet' => $tweet->id]) }}" method="POST" class="container p-4"
                            style="background: #FFFFFF;">
                            @csrf
                            @method('DELETE') {{-- Método para borrar --}}

                            {{-- <div class="text-light-emphasis w-100 mb-4">{{ $tweet->message }}</div>
                            @error('tweet')
                                <div class="alert alert-danger">{{ $tweet->message }}</div>
                            @enderror

                            <div class="container d-flex g-0">
                                <button type="submit" class="btn btn-primary me-3" style="background: #7749F8;">Si, eliminar</button>
                                <a href="{{ route('tweets') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweets
        </h2>
    </x-slot>

    <div class="container-lg mt-5 lg:mx-auto lg:w-8/12">
        <form action="{{ route('tweets.destroy', ['tweet' => $tweet->id]) }}" method="POST"
            class="container bg-white p-7 border border-gray-200 rounded-lg">
            @csrf
            @method('delete')
            <h2 class="mb-2"><strong>Vas a eliminar tu tweet</strong></h2>

            <div name="tweet"
                class="container mx-auto mb-4 mt-4 ml-8">
                <em>{{$tweet->message}}</em>
            </div>

            @error('tweet')
                <div role="alert">
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mb-2">
                        {{ $message }}</div>
                </div>
            @enderror

            <div class="container d-flex gap-4 flex justify-end">
                <a href="{{ route('tweets') }}" class="btn px-4 py-2 ml-4 bg-white-400 rounded-lg w-auto">Cancelar</a>
                <button type="submit"
                    class="px-4 py-2 bg-red-600 w-auto border rounded-lg text-white">Eliminar</button>
            </div>
        </form>
    </div>



</x-app-layout>
