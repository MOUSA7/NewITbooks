@extends('layouts.app')

@section('content')

    @include('partials.tinymce')
    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h3>Create Blog</h3>
            </div>
            @include('partials.errors')
            <div class="col-sm-8 col-sm-offset-2">
                {!! Form::open(['method'=>'POST','action'=>'BlogController@store','files'=>true]) !!}

                <div class="form-group">

                    {!! Form::label("title","Title :") !!}
                    {!! Form::text("title",null,["class"=>"form-control"]) !!}

                </div>
                    <div class="form-group">
                        {!! Form::label('body','Body :') !!}
                        {!! Form::textarea('body',null,['class'=>'form-control my-editor']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('photo_id','Photo :') !!}
                        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id', 'Categories :') !!}
                        {!! Form::select('category_id[]',$categories,null,['class'=>'form-control']) !!}
                    </div>


                    <div class="form-group">
                        {!! Form::label("meta_desc","Meta Desc :") !!}
                        {!! Form::text("meta_desc",null,["class"=>"form-control"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit("Create Blog",['class'=>'btn btn-success']) !!}
                    </div>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </main>
@endsection
