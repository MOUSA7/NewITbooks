@extends('layouts.app')

@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h3>Edit Category</h3>
            </div>

            <div class="col-sm-8 col-sm-offset-2">
                {!! Form::model($category,['method'=>'PATCH','action'=>['CategoryController@update',$category->id]]) !!}

                <div class="form-group">

                    {!! Form::label("name","name :") !!}
                    {!! Form::text("name",null,["class"=>"form-control"]) !!}

                </div>
                {!! Form::submit("Edit Category",['class'=>'btn btn-success']) !!}

                {!! Form::close() !!}


                {!! Form::open(['method'=>'DELETE','action'=>['CategoryController@destroy',$category->id]]) !!}

                {!! Form::submit('Delete Category',['class'=>'btn btn-danger']) !!}

                {!! Form::close() !!}
            </div>

        </div>
    </main>
@endsection
