@extends('layouts.app')

@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Hello {{$user->name}}</h1>
            </div>
        </div>
    </main>

    <div class="container">
            <div class="col-sm-8">
                @include('partials.errors')
                {!! Form::model($user,['method'=>'PATCH','action'=>['UsersController@update',$user->id],'files'=>true]) !!}

                <div class="form-group">
                {!! Form::label('name','Name :') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('about','About :') !!}
                    {!! Form::textarea('about',null,['class'=>'form-control','placeholder'=>'Write About User here !']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('website','Website :') !!}
                    {!! Form::text('website',null,['class'=>'form-control','placeholder'=>'Write website Link ex:https/link.com']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('facebook','Facebook :') !!}
                    {!! Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Write facebook Link ex:https/facebook.com']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('github','Github :') !!}
                    {!! Form::text('github',null,['class'=>'form-control','placeholder'=>'Write website github ex:https/github.com']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('photo_id','Image :') !!}
                    {!! Form::file('photo_id') !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Edit',['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
    </div>


@endsection
