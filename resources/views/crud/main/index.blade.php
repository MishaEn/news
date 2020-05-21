@extends('crud.layouts.template')
@section('content')
    <pre>
    @php
        $url = 'http://www.ura.ru/export/all.rss';
        $rss = simplexml_load_file($url);
        foreach($rss as $item){
           foreach($item->item as $value){
               var_dump($value);
           }
        }
    @endphp
        </pre>
    @foreach($news_list as $news)
        <div class="row">
            <div class="col-12">
                <div class="card" style="margin-bottom: 20px">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <div class="card-title">
                                    <a href="{{route('web.show.news', $news->id)}}">{{$news->title}}</a>
                                </div>
                            </div>
                            <div class="col-2 text-right">
                                <button class="btn btn-block btn-success">Редактировать</button>
                            </div>
                            <div class="col-2 text-right">
                                <button class="btn btn-block btn-danger">Удалить</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{$news->description}}
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">Комменты - <a href="{{route('web.index.news')}}">100</a></div>
                            <div class="col-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
