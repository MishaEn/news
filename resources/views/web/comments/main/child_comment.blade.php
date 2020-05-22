<li>{{ $child_comment->description }}</li>
<ul>
    @foreach ($child_comment->childComments()->get() as $childComment)
        @if($childComment)
            @include('web.comments.main.child_comment', ['child_comment' => $childComment])
        @endif
    @endforeach
</ul>
