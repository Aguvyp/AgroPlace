@extends('layouts.main')
@section('body')
    <div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="edit-tittle d-flex pt-5 pb-2">
                    <h1>
                        Publicá tu Tweet
                    </h1>
                </div>

                <div class="create bg-white mt-0.4 p-4 d-flex w-100">

                    <div class="create-content w-100">

                        @if ($errors->any())
                            <div>
                                Hubo un error, revisa los campos
                            </div>
                        @endif

                        <form id="formCreate" action="{{ route('tweets.store') }}" method="POST">
                            @csrf
{{--
                            <div class="mb-3">
                                <input name="name" type="text" class="form-control" placeholder="Tu nombre"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <div class="mb-3">
                                <textarea name="tweet" class="form-control" placeholder="!¿Qué está pensando?¡" rows="3">{{old('tweet')}}</textarea>
                                @error('tweet')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </form>

                        <div class="create-action d-flex mt-2">
                            <button form="formCreate" class="btn btn-primary me-2" type="submit" style="background: #7749F8;">
                                Enviar
                            </button>


                            <a class="btn btn-outline-secondary link-underline link-underline-opacity-0" href="{{ route('tweets') }}">
                                Volver
                             </a>

                        </div>
                        {{-- <div>
                                <label>Tweet:</label>
                                <input name="tweet" value="{{ old('tweet') }}">
                                @error('tweet')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label>Tu nombre:</label>
                                <input name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <hr> --}}





                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
