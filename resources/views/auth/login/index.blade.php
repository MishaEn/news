@extends('auth.layouts.template')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card" style="margin-top: 20px;">
                <div class="card-header">
                    <div class="card-title"><h4>{{$title}}</h4></div>
                </div>
                <div class="card-body">
                    @if($errors->any()) @foreach($errors->all() as $error) <p>{{ $error }}</p><br/> @endforeach @endif
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label" for="remember">Запомнить меня</label>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
