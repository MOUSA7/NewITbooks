@extends('layouts.app')

@section('content')

    @include('partials.tinymce')
    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h3>Contact Company</h3>
            </div>
            @include('partials.errors')

            <div class="col-sm-8">
                {!! Form::open(['method'=>'POST','action'=>'MailController@send']) !!}

                <div class="form-group">
                    {!! Form::label('name','Name :') !!}
                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter UserName']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("email","email :") !!}
                    {!! Form::text("email",null,["class"=>"form-control",'placeholder'=>'Enter Email']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('subject', 'Subject :') !!}
                    {!! Form::text('subject',null,['class'=>'form-control','placeholder'=>'Enter Subject here']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('mail_message','Message :') !!}
                    {!! Form::textarea('mail_message',null,['class'=>'form-control','placeholder'=>'Enter Your Message']) !!}
                </div>


                <div class="form-group">
                    {!! Form::submit("Send",['class'=>'btn btn-primary col-sm-12']) !!}
                </div>

                {!! Form::close() !!}

            </div>

        </div>

    </main>
@endsection
