@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Админка
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{route('admin.index.news')}}" class="btn btn-block btn-primary">Фид</a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('admin.index.rss')}}" class="btn btn-block btn-primary">RSS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
