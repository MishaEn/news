<div class="row">
    <div class="col-12">
        @foreach($comments as $comment)
            <div class="row">
                <div class="col-1">

                </div>
                <div class="col-1">
                    <div class="col-1">
                        <a href="{{ route('web.show.comments', ['news_id' => $news->id, 'comment_id' => $comment->id])}}">#{{ $comment->id }}  </a>
                    </div>
                </div>
                <div class="col-10">
                    {{$comment->description}}
                </div>
            </div>

            @foreach ($comment->childComments()->get() as $childComment)
                @include('web.comments.main.child_comment', ['child_comment' => $childComment])
            @endforeach
        @endforeach
    </div>
</div>
