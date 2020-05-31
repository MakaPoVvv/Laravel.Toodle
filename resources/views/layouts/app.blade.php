<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

{{--browser's icon--}}
    <link rel="icon" href="{{asset('images/1-10400_clipart-green-check-mark-icon-check-favicon-png-removebg-preview.png')}}" style="background-color: transparent">
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/'.app()->getLocale()) }}">
                    <img src="{{asset('images/logo.png')}}" height="30" width="100" alt="">
                </a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login', app()->getLocale()) }}">{{ __('message.login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register', app()->getLocale()) }}">{{ __('message.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown d-flex align-items-center">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="Shidden"><img src="{{asset(Auth::user()->image)}}" height="30" width="30" style="border-radius:50%; margin-right: 10px" alt=""><a
                                            href="{{url('/home/'.app()->getLocale().'/'.Auth::user()->id.'/account')}}" class="Shidden">{{ Auth::user()->name }}</a></span>
                                    <a href="{{route('tasks.create', app()->getLocale())}}" class="hidden btn btn-info">create</a>
                                    <a href="{{url('/home/'.app()->getLocale().'/'.Auth::user()->id.'/account')}}" class="hidden btn btn-primary">personal cabinet</a>
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

        <main class="py-4">
            @yield('content')
        </main>

</body>
</html>

