@extends('layouts.app')
@section('content')

    @include('partials.tinymce')


    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h3>Edit Blog</h3>
            </div>
            @include('partials.errors')
            <div class="col-sm-8 col-sm-offset-2">
                {!! Form::model($blog,['method'=>'PATCH','action'=>['BlogController@update',$blog->id],'files'=>true]) !!}

                <div class="form-group">

                    {!! Form::label("title","Title :") !!}
                    {!! Form::text("title",$blog->title,["class"=>"form-control"]) !!}
                    <input type="hidden" name="is_edit" value="1">
                </div>

                    <div class="form-group">
                        {!! Form::label('body','Body :') !!}
                        {!! Form::textarea('body',$blog->body,['class'=>'form-control my-editor','row'=>1]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('photo_id','Photo :') !!}
                        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id','Categories :') !!}
                        {!! Form::select('category_id[]',$categories,null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("meta_desc","Meta Desc :") !!}
                        {!! Form::text("meta_desc",null,["class"=>"form-control"]) !!}
                    </div>

                    {!! Form::submit("Edit",['class'=>'btn btn-success']) !!}

                    {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE','action'=>['BlogController@delete',$blog->id]]) !!}

                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </main>
@endsection
