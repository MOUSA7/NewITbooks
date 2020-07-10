@extends('layouts.app')

@section('content')

    <main class="container">
        <div class="container">
            <div class="jumbotron">
                <h3>Create Category</h3>
            </div>

            <hr>
            <div class="row">

            <div class="col-sm-8">

                {!! Form::open(['method'=>'POST','action'=>'CategoryController@store']) !!}

                <div class="form-group">

                    {!! Form::label("name","Name :") !!}
                    {!! Form::text("name",null,["class"=>"form-control"]) !!}

                </div>
                <div class="form-group">
                    {!! Form::submit("Create Category",['class'=>'btn btn-success']) !!}
                </div>
                    {!! Form::close() !!}

                </div>
            <div class="col-sm-4">
                <h3>Lists</h3>
                <hr>
                @foreach($categories as $category)
                    <li style="list-style-type: none"><a href="{{route('categories.show',$category->slug)}}">{{$category->name}}</a></li>
                @endforeach

            </div>
            </div>

        </div>

    </main>
@endsection
