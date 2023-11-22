@extends('layouts.main')
@section('body')
    <div>
        <div class="row">
            <div class="col-8 offset-2">

                <div class="edit-tittle d-flex pt-5 pb-2">
                    <h1>
                        Edita tu Tweet
                    </h1>
                </div>


                <div class="edit bg-white mt-0.4 p-4 d-flex w-100">
                    <div class="edit-content w-100">

                        @if ($errors->any())
                            <div>Hubo un error, revisa los campos</div>
                        @endif


                        <form id="formEdit" action="{{ route('tweets.update', ['tweet' => $tweet->id]) }}" method="POST">
                            @csrf
                            @method('put')

                            <div class="edit-tweet">
                                <textarea class="form-control no-resizable" name="tweet" style="resize: none">{{ $tweet->message }}</textarea>
                                @error('tweet')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </form>

                        <div class="edit-action d-flex mt-2">

                            <button form="formEdit" class="btn btn-primary me-2" type="submit" style="background: #7749F8;">
                                Actualizar
                            </button>

                            <a class="btn btn-outline-secondary link-underline link-underline-opacity-0" href="{{ route('tweets') }}">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
