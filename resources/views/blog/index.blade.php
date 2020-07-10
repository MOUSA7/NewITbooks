
@extends('layouts.app')

@include('partials.meta_static')

@section('content')

    <main class="container">
    <div class="container-fluid">
            <div class="jumbotron">
                <h1>Latest Blog Posts</h1>
            </div>

        <div class="col-sm-12">
            @foreach($blogs as $blog)
                <article>
                    <h3><a href="{{route('blog.show',$blog->id)}}">{{$blog->title}}</a></h3>

                    <h4>{!! $blog->body !!}</h4>
                </article>

            @endforeach
        </div>


        </div>
        <a href="{{route('blog.trash')}}">Trash</a>
    </main>


 @endsection
