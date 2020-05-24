@extends('layouts.template')
@section('content')
    {{--<div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                    {{$title}}
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.update.rss')}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Название rss" value="">
                        </div>
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" name="url" class="form-control" id="url" placeholder="Url" value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
