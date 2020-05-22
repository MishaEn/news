@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Комментарии к новости <a href="{{route('web.show.news', $news->id)}}">#{{ $news->id }}</a></h1>
        </div>
    </div>

    @include('web.comments.main.comment')
@endsection
