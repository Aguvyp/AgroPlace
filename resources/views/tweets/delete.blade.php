@extends('layouts.main')
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

                            <div class="text-light-emphasis w-100 mb-4">{{ $tweet->message }}</div>
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
@endsection
