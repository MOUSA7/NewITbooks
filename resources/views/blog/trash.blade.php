@extends('layouts.app')

@section('content')

    <main class="container-fluid">
        <div class="container-fluid">
            <article>
                <div class="jumbotron">
                    <h1>Trash Blog</h1>
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    @foreach($Trashes as $blog)
                        <article>
                            <h3>{{$blog->title}}</h3>

                            <h4>{{$blog->body}}</h4>
                        </article>

                        {!! Form::open(['method'=>'GET','action'=>['BlogController@restore',$blog->id]]) !!}
                        {!! Form::submit('Restore',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    @endforeach
                </div>
            </article>
        </div>
    </main>

@endsection
