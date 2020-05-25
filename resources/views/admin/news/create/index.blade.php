@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                    {{$title}}
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.store.news')}}">
                        @csrf
                        <div class="form-group">
                            <label for="category">Rss</label>
                            <select class="form-control" name="rss_id" id="rss_id">
                                @foreach($rss_list as $rss)
                                    <option value="{{$rss->id}}">{{$rss->rss_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Категория</label>
                            <input type="text" name="category" class="form-control" id="category" placeholder="Категория" value="">
                        </div>
                        <div class="form-group">
                            <label for="author">Автор</label>
                            <input type="text" name="author" class="form-control" id="author" placeholder="Автор" value="">
                        </div>
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок" value="">
                        </div>
                        <div class="form-group">
                            <label for="description">Текст новости</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" name="url" class="form-control" id="url" placeholder="Url" value="">
                        </div>
                        <div class="form-group">
                            <label for="publication_date">Дата публикации</label>
                            <input type="text" name="publication_date" class="form-control" id="publication_date" placeholder="Дата публикации" value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
