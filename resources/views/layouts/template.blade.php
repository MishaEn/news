<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title}}</title>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>
    {{--{{\Illuminate\Support\Facades\Auth::user()}}--}}
    <div class="container-fluid">
        <header style="margin-bottom: 20px; margin-top: 20px">
            <div class="row">
                <div class="col-11">
                    <h4><span class="badge badge-pill badge-dark">News-list</span></h4>
                </div>
                <div class="col-1">
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <button
                            class="btn-danger btn btn-block"
                            onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
                            Выход
                        </button>
                    @endif
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </header>
        @yield('content')
    </div>
</body>
</html>
