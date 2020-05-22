<ul>
    @foreach($comments as $comment)

        <li>{{$comment->description}}</li>
        <ul>
            @foreach ($comment->childComments()->get() as $childComment)
                @include('web.comments.main.child_comment', ['child_comment' => $childComment])
            @endforeach
        </ul>
    @endforeach
</ul>
