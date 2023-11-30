<h1>{{ $user->name }}'s Profile</h1>

<h2>Latest Tweets:</h2>
<ul>
    @foreach($latestTweets as $tweet)
        <li>{{ $tweet->content }}</li>
    @endforeach
</ul>

<h2>Latest Replies:</h2>
<ul>
    @foreach($latestReplies as $reply)
        <li>{{ $reply->message }} (In response to: {{ $reply->tweet->content }})</li>
    @endforeach
</ul>
