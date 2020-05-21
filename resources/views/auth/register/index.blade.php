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
                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Подтвердите пароль</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password">
                        </div>
                        <input type="text" hidden name="type" value="0">
                        <button class="btn btn-primary btn-block" type="submit">Регистрация</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




       {{-- <div>
            Name
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            Email
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            Password
            <input type="password" name="password">
        </div>

        <div>
            Confirm Password
            <input type="password" name="password_confirmation">
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>
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
    </form>--}}
@endsection
