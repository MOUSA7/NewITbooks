@extends('layouts.app')

@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Admin Dashboard Blog </h1>
            </div>
            <div class="col-sm-12 admin-button">

                <a href="{{route('blog.create')}}" class="btn btn-primary">Create Blog</a>
                <a href="{{route('blog.trash')}}" class="btn btn-danger">Trash Blog</a>
                <a href="{{route('media.index')}}" class="btn btn-warning">Feature Image</a>
                <a href="{{route('users.userslist')}}" class="btn btn-success">Users</a>
                <a href="{{route('categories.create')}}" class="btn btn-info">Categories</a>

            </div>
        </div>
    </main>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-header">Recent Blog</h1>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{$blog->title}}</td>
                                <td>{{ Str::limit($blog->body,70)}}</td>
                                <td>{{$blog->status == 0 ? 'Draft' : 'Publish'}}</td>
                                <td>
                                    @if($blog->status == 0)

                                        {!! Form::model($blog,['method'=>'PATCH','action'=>['BlogController@publish',$blog->id]]) !!}

                                        <input type="hidden" name="status" value="1">


                                        {!! Form::submit('Publish',['class'=>'btn btn-primary'])  !!}


                                        {!! Form::close() !!}

                                    @else

                                        {!! Form::model($blog,['method'=>'PATCH','action'=>['BlogController@publish',$blog->id]]) !!}

                                        <input type="hidden" value="0" name="status">

                                        {!! Form::submit('Draft',['class'=>'btn btn-success'])  !!}

                                        {!! Form::close() !!}

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
