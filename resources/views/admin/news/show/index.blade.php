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
                    <div class="row">
                        <div class="col-4 offset-4 text-right text-danger">
                            <a class="btn-block btn btn-success" methods="get" href="{{route('admin.edit.news', ['news_id' => $news->id])}}">
                                <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                    <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                </svg></a>
                        </div>
                        <div class="col-4 text-right text-danger">
                            <form method="post" action="{{route('admin.destroy.news', ['news_id' => $news->id])}}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-block">
                                    <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
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
                    <svg class="bi bi-heart-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" clip-rule="evenodd"/>
                    </svg>
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
