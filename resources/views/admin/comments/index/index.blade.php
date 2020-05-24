@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <h1>Комментарии к новости <a href="{{route('web.show.news', $news->id)}}">#{{ $news->id }}</a></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3">
            @include('admin.comments.index.comment')
        </div>
    </div>

    <div class="row">
        <div class="col-6 offset-3">
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
@endsection
