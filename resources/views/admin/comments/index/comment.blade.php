<div class="row">
    <div class="col-12">
        @foreach($comments as $comment)
            <div class="row mb-1">
                <div class="col-1 pr-0">
                    <small><span class="badge badge-primary"><a style="color: #fff" href="{{ route('web.show.comments', ['news_id' => $news->id, 'comment_id' => $comment->id])}}">#{{ $comment->id }}  </a></span></small>
                </div>
                <div class="col-1 text-left p-0">
                    <small><span class="badge-secondary badge badge-small">{{$comment->user()->get()[0]->name}}</span></small>
                </div>
                <div class="col-3">
                    <small>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</small>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {{$comment->description}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <small style="color: #7b7b7b">Ответить</small>
                </div>
            </div>
            <hr>
            @foreach ($comment->childComments()->get() as $childComment)
                @include('admin.comments.index.child_comment', ['child_comment' => $childComment])
            @endforeach
        @endforeach
    </div>
</div>
