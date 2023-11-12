<h1>{{ $post->title }}</h1>
<p>{{ $post->body }}</p>
<b>ID Comment</b>
@foreach ( $comments as $comment)
    <li> {{$comment['id'] }}: {{$comment['comment'] }}</li>
@endforeach
