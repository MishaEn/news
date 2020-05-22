<div class="row pl-3">
    <div class="col-12">
        <div class="row">
            <div class="col-1">
                {{ $child_comment->user()->get() }}
            </div>
            <div class="col-1">
                <a href="{{ route('web.show.comments', ['news_id' => $news->id, 'comment_id' => $child_comment->id])}}">#{{ $child_comment->id }}  </a>
            </div>
            <div class="col-10 text-left">
                {{ $child_comment->description }}
            </div>
        </div>

        @foreach ($child_comment->childComments()->get() as $childComment)
            @if($childComment)
                @include('web.comments.main.child_comment', ['child_comment' => $childComment])
            @endif
        @endforeach
    </div>
</div>
