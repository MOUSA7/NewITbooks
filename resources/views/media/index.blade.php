@extends('layouts.app')

@include('partials.meta_static')

@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Latest Blog Posts</h1>
            </div>
            <div class="col-sm-12">
                @foreach($photos as $photo)
                    <div>
                        <li style="list-style-type: none">
                            <img height="100" src="/images/{{$photo->file}}" alt="">
                        </li>
                    </div>

                    {!! Form::open(['method'=>'DELETE','action'=>['PhotoController@destroy',$photo->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete Photo',['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                @endforeach
            </div>


        </div>
        <a href="{{route('blog.trash')}}">Trash</a>
    </main>


@endsection
