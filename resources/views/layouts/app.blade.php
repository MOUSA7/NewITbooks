<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>@yield('meta_title')</title>
    <meta name="description" content="@yield('meta_desc')">
    <meta name="author" content="@yield('meta_author')">
{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.5.1.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
{{--            <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                {{ config('app.name', 'Laravel') }}--}}
{{--            </a>--}}
            <a class="navbar-brand" href="{{ url('/') }}">
                NewItBooks
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                    <li class="dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Categories <span class="caret"></span>
                        </a>
                        @if($c)
                            <ul class="dropdown-menu" role="menu">
                            @foreach($c as $c)
                                @if($c->blog->count() > 0)

                                        <li>
                                            <a style="list-style-type: none" href="{{route('categories.show',$c->slug)}}">{{$c->name}}</a>
                                        </li>

                                    @endif
                                @endforeach
                            </ul>
                            @endif

                    </li>

                    <li><a class="nav-link" href="{{route('blog.index')}}" style="text-decoration: none">Blog <span class="badge bg-dark text-white"></span></a>
                    </li>
                    @if(Auth::check())
                    <li><a class="nav-link" href="{{route('users.index')}}" style="text-decoration: none">Dashboard<span class="badge bg-dark text-white"></span></a>
                    </li>
                    @endif
                    @if(Auth::check() && Auth::user()->role_id ==1)
                    <li><a class="nav-link" href="{{route('admin.index')}}" style="text-decoration: none">Admin <span class="badge bg-dark text-white"></span></a>
                    </li>
                        @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login/github') }}">Login With Github</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login/facebook') }}">Login With Facebook</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login/google') }}">Google</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
@include('sweetalert::alert')

</body>
</html>
