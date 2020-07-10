
@extends('layouts.app')
@include('partials.meta_static')
@section('content')
    <div id="welcome">
        <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="title m-b-md">
                    NewItBooks
                </div>

                <div class="links">
                    <a href="{{route('blog.index')}}">Blog</a>
                    <a href="{{route('login')}}">Login</a>
                    <a href="{{route('register')}}">Register</a>
                </div>
            </div>
        </div>
    </div>
@endsection
