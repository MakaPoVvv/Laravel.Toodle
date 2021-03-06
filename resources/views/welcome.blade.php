<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Toodle</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <link rel="icon"
          href="{{asset('images/1-10400_clipart-green-check-mark-icon-check-favicon-png-removebg-preview.png')}}"
          style="background-color: transparent">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">

        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            @auth()
                <a class="navbar-brand" href="{{ url('/home/'.app()->getLocale().'/'.Auth::user()->id) }}">
                    <img src="{{asset('images/logo.png')}}" height="100" width="250" alt=""></a>
            @else
                <img src="{{asset('images/logo.png')}}" height="100" width="250" alt=""></a>

            @endauth
            <div class="d-flex align-items-center justify-content-center">

                <a class="lang" href="{{url(Route::currentRouteName().'/ru')}}">
                    <img src="{{asset('/images/flag-3d-round-250.png')}}" width="25"  height="25" alt="">
                </a>

                <a class="lang" href="{{url(Route::currentRouteName().'/en')}}">
                    <img src="{{asset('/images/download.png')}}" width="25" , height="25" alt="">
                </a>

                <a class="lang" href="{{url(Route::currentRouteName().'/uk')}}">
                    <img src="{{asset('/images/download (1).png')}}" width="25" , height="25" alt="">
                </a>
            </div>
        </div>

        <div class="links">
            @auth
                <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-info">{{__('message.logout')}}</button>
                </form>
            @else
                <a href="{{ route('login', app()->getLocale()) }}">{{__('message.login')}}</a>

                @if (Route::has('register'))
                    <a href="{{ route('register', app()->getLocale()) }}">{{__('message.register')}}</a>
                    <a href="https://github.com/MakaPoVvv/Laravel.Toodle">GitHub</a>
                @endif
            @endauth
        </div>
    </div>
</div>
</body>
</html>
