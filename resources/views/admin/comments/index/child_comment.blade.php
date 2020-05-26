<div class="row pl-5">
    <div class="col-12">
        <div class="row mb-1">
            <div class="col-1 pr-0">
                <small><span class="badge badge-primary"><a style="color: #fff" href="{{ route('web.show.comments', ['news_id' => $news->id, 'comment_id' => $childComment->id])}}">#{{ $childComment->id }}  </a></span></small>
            </div>
            <div class="col-1 text-left p-0">
                <small><span class="badge-secondary badge badge-small">{{$childComment->user()->first()->name}}</span></small>
            </div>
            <div class="col-3">
                <small>{{\Carbon\Carbon::parse($childComment->created_at)->diffForHumans()}}</small>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{$childComment->description}}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <small style="cursor: pointer;color: #7b7b7b" data-collapsed="true" data-type="comment-response" data-comment="{{$childComment->id}}" data-news="{{$news->id}}">Ответить</small>
            </div>
        </div>
        <hr>
        @foreach ($child_comment->childComments()->get() as $childComment)
            @if($childComment)
                @include('admin.comments.index.child_comment', ['child_comment' => $childComment])
            @endif
        @endforeach
    </div>
</div>
