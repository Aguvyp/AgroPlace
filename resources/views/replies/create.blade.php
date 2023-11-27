@extends('layouts.main')
@section('body')
    <h1 class="my-4">RESPONDER</h1>

    <!--En caso de error mostrar mensaje-->
    @if ($errors->any())
        <div class="text-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('replies.store', $tweet_id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="reply" class="h4">Respuesta a tweet #{{ $tweet_id }}</label>
            <input type="hidden" name="tweet_id" value="{{ $tweet_id }}">
            <input name="reply" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">
                Enviar
            </button>
            <a href="{{ route('tweets') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </form>

@endsection
