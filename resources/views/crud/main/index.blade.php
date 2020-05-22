@extends('layouts.template')
@section('content')
    @foreach($rss_list as $rss)
        <div class="row" style="margin-top: 20px;">
            @foreach($rss as $feed)
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                {{$feed->rss_name}}
                            </div>
                        </div>
                        <div class="card-body" style="overflow-y: scroll; height: 450px;">
                            @foreach($feed->news()->get() as $news)
                                <div class="news-row">
                                    <div class="row mt-1">
                                        <div class="col-10">
                                            <a href="{{route('web.show.news', $news->id)}}">{{$news->title}}</a>
                                        </div>

                                        <div class="col-2 text-right">
                                            <span class="badge badge-light">{{$news->publication_date}}</span>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-2">
                                            <a href="" class="badge badge-secondary">{{$news->category}}</a>
                                        </div>
                                        <div class="col-2">
                                            {{$news->author}}
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-12">
                                            {{$news->description}}
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-6 text-left">
                                            <a href="{{route('web.index.comments', $news->id)}}">{{$news->comments()->count()}} - комментариев</a>
                                        </div>
                                        <div class="col-6 text-right">
                                            <svg class="bi bi-heart-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                    {{--{{$feed->news()}}--}}
                </div>
            @endforeach
        </div>
        {{--<div class="row">
            <div class="col-12">
                <div class="card" style="margin-bottom: 20px">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <div class="card-title">
                                    <a href="{{route('web.show.rss', $rss->id)}}">{{$news->title}}</a>
                                </div>
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
        </div>--}}
    @endforeach
    <pre>
        </pre>
    {{--@foreach($news_list as $news)

    @endforeach--}}
@endsection
