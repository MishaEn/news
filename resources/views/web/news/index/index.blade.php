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
                                            @if(\Illuminate\Support\Facades\Auth::user())
                                                @if($news->like()->where(['news_id' => $news->id, 'user_id' => \Illuminate\Support\Facades\Auth::user()->id])->first())
                                                    <i data-like="true" style="color:  #b80b00; cursor: pointer" data-type="like" data-id="{{$news->id}}">
                                                        Лайк <span data-type="like-count">{{$news->like()->count()}}</span>
                                                    </i>
                                                @else
                                                    <i data-like="false" data-type="like" style="cursor: pointer" data-id="{{$news->id}}">
                                                        Лайк <span data-type="like-count">{{$news->like()->count()}}</span>
                                                    </i>
                                                @endif
                                            @else
                                                <i data-like="false" data-type="like" style="cursor: pointer" data-id="{{$news->id}}">
                                                    Лайк <span data-type="like-count">{{$news->like()->count()}}</span>
                                                </i>
                                            @endif
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
