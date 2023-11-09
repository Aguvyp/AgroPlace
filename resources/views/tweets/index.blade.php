<div>
    <h1>Twitter</h1>

    <p><a href="{{ route('tweets.create')}}">Publicá tu tweet</a></p>

    @foreach ($tweets as $tweet )
        <div>{{$tweet->message}}</div>
        <hr>
    @endforeach
</div>
