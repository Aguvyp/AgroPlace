<div>
    <h1>Twitter</h1>

    <p><a href="{{ route('tweets.create')}}">Publicá tu tweet</a></p>

    @foreach ($tweets as $tweet )
        <div>
            Tweet: {{$tweet->message}}
            <br>
            Autor: {{$tweet->autor}}
        </div>

        <hr>
    @endforeach
</div>
