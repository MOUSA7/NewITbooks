@extends('layouts.app')

@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>{{$category->name}}</h1>
                <a href="{{route('categories.edit',$category->id)}}" style="float: right">Edit</a>

            </div>
            <div class="col-sm-12">
                <h1 class="text-center"><strong>Latest Blog On {{$category->name}}</strong></h1>
                @foreach($category->blog as $blog)
                    <article>

                        <hr>
                        <h3><a href="{{route('blog.show',$blog->id)}}">{{$blog->title}}</a></h3>
                    </article>
                @endforeach


            </div>


        </div>
    </main>


@endsection
