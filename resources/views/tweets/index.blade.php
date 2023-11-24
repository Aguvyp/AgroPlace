@extends('layouts.main')
@section('body')
    <div>
        <div class="row">
            <div class="col-8 offset-2">

                <div class="alerts pt-2 w-100">
                    @if ($notify_tweet_published)
                        <div class="alert alert-success" role="alert">
                            Tu tweet ha sido publicado
                        </div>
                    @endif

                    @if ($notify_tweet_updated)
                        <div class="alert alert-success" role="alert">
                            Tu tweet ha sido actualizado
                        </div>
                    @endif

                    @if ($notify_tweet_deleted)
                        <div class="alert alert-danger" role="alert">
                            Tu tweet ha sido eliminado
                        </div>
                    @endif
                </div>

                <p class="tweet-create pt-3 d-flex justify-content-end">
                    <a href="{{ route('tweets.create') }}" class="btn btn-primary" style="background: #7749F8;">
                        Publicá tu tweet
                    </a>
                </p>

                @foreach ($tweets as $tweet)
                    <div class="tweet bg-white mb-4 p-4 d-flex w-100">

                        <img class="tweet-image me-4" src="{{ asset('upload/users/users.png') }}" alt="{{ $tweet->name }}" style="border-radius: 50%">

                        <div class="tweet-content w-100">

                            <div class="tweet-timestamp">
                                {{ $tweet->created_at }}
                            </div>

                            <div class="tweet-messagecom">
                                @if ($tweet->user != null)
                                <strong>{{$tweet->user->name}}:</strong>
                                @endif
                                {{ $tweet->message }}
                            </div>

                            <div class="tweet-actions d-flex justify-content-between w-100">
                                <a class="link-underline link-underline-opacity-0" href="">
                                    Contestar
                                </a>

                                <div>
                                    <a class="link-underline link-underline-opacity-0"
                                        href="{{ route('tweets.edit', ['tweet' => $tweet->id]) }}">
                                        Editar
                                    </a>
                                    <a class="link-underline link-underline-opacity-0 ps-4"
                                        href="{{ route('tweets.delete', ['tweet' => $tweet->id]) }}">
                                        Eliminar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
