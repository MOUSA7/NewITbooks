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
                @include('partials.errors')
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
                    <li style="list-style-type: none">
                        <a href="{{route('categories.show',$category->slug)}}"><h3>{{$category->name}}</h3></a>
                        {!! Form::model($category,['method'=>'DELETE','action'=>['CategoryController@destroy',$category->id]]) !!}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                        <hr>
                    </li>
                @endforeach

            </div>
            </div>

        </div>

    </main>
@endsection
