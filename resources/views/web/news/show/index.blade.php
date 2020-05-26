@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <div class="row">
                <div class="col-12">
                    <h1>{{$news->title}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <span class="badge badge-light">{{$news->publication_date}}</span>
                </div>
                <div class="col-3">
                    @if(!is_null($news->author))
                        Автор - {{$news->author}}
                    @endif
                </div>
                <div class="col-4">

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        {{$news->description}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-left">
                    {{$news->comments()->count()}} комментариев
                </div>
                <div class="col-6 text-right">
                    @if($news->like()->where(['news_id' => $news->id, 'user_id' => \Illuminate\Support\Facades\Auth::user()->id])->first())
                        <i data-like="true" style="color:  #b80b00; user-select: none; cursor: pointer" data-type="like" data-id="{{$news->id}}">
                            Лайк <span data-type="like-count">{{$news->like()->count()}}</span>
                        </i>
                    @else
                        <i data-like="false" data-type="like" style="cursor: pointer; user-select: none;" data-id="{{$news->id}}">
                            Лайк <span data-type="like-count">{{$news->like()->count()}}</span>
                        </i>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    @include('admin.comments.index.comment', ['comments' => $news->comments()->get()])
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('web.store.comments', ['news_id' => $news->id])}}">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Введите комментарий</label>
                            <input type="text" name="comment" class="form-control" id="comment" placeholder="Ваша мысля...">
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
