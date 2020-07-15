@extends('layouts.app')

@include('partials.meta_static')

@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>New It Books</h1>
            </div>

            <div class="col-sm-12">
                @foreach($blogs as $blog)
                    <article>
                        <h3><a href="{{route('blog.show',$blog->slug)}}">{{$blog->title}}</a></h3>

                        <p>{!! Str::limit($blog->body,400) !!}</p>
                        @if($blog->user)
                            <p>Write By <i class="fa fa-btn fa-user"> <a href="{{route('users.show',$blog->user->username)}}"> {{$blog->user->name}}</a>
                                </i> / Posted <strong>
                                    <i class="fa fa-btn fa-clock-o"> {{$blog->created_at->diffForHumans()}}</i></strong>
                                @foreach($blog->category as $category)
                                    <i class="fa fa-btn fa-cubes"> <a
                                            href="{{route('categories.show',$category->slug)}}">{{$category->name}}</a></i> @endforeach
                            </p>
                        @endif
                    </article>

                @endforeach
            </div>


        </div>
        <a href="{{route('blog.trash')}}">Trash</a>
    </main>


@endsection
