@extends('layouts.app')

@include('partials.meta_dynamic')

@section('content')

    <main class="container">
        <div class="container-fluid">
            <article>
                <div class="jumbotron">

                        @if($blog->photo)
                            <img src="/images/{{$blog->photo ? $blog->photo->file : 'Not Found Image'}}" alt="{{Str::limit($blog->title)}}"
                                  style="max-width: 100%">
                            <br/>
                        @endif

                    <h1>{{$blog->title}}</h1>
                    <a href="{{route('blog.edit',$blog->id)}}" style="float:right" class="btn btn-success">Edit Blog</a>
                    <a href="{{action('BlogController@delete',$blog->id)}}" style="float:right" class="btn btn-danger">Delete
                        Blog</a>
                </div>
                <div class="col-sm-8 col-sm-offset-2">

                    <p>{!! $blog->body !!}</p>

                    @foreach($blog->category as $category)
                        <p><a href="{{route('categories.show',$category->slug)}}">{{$category->name}}</a></p>
                    @endforeach

                </div>
            </article>
        </div>
    </main>

@endsection
