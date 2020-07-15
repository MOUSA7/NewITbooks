@extends('layouts.app')

@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Users Blog</h1>
            </div>
            <div class="col-sm-12 admin-button">

                <a href="{{route('blog.create')}}" class="btn btn-primary">Create Blog</a>
                <a href="{{route('blog.trash')}}" class="btn btn-danger">Trash Blog</a>
                <a href="{{route('media.index')}}" class="btn btn-warning">Feature Image</a>

            </div>
        </div>
    </main>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-header">Recent Users</h1>
                <div class="table table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>

                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                        <th>Role</th>
                        <th>Action</th>
                        <th>Destroy</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                            <td><a href="{{route('users.show',$user->username)}}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>

                        <td>
                            {{Form::model($user,['method'=>'PATCH','action'=>['UsersController@update',$user->id]])}}
                            {!! Form::select('role_id',$roles,null,['class'=>'col-sm-6']) !!}
                            {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>

                        </td>
                        <td>
                            {!! Form::model($user,['method'=>'DELETE','action'=>['UsersController@destroy',$user->id]]) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>

{{--                <div class="table-responsive">--}}
{{--                    <table class="table table-striped">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Name</th>--}}
{{--                            <th>Email</th>--}}
{{--                            <th>Joined</th>--}}
{{--                            <th>Role</th>--}}
{{--                            <th>Action</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                            <tr>--}}
{{--                                @foreach($users as $user)--}}
{{--                                <td>{{$user->name}}</td>--}}
{{--                                <td>{{$user->email}}</td>--}}
{{--                                <td>{{$user->created_at->diffForHumans()}}</td>--}}

{{--                                {{Form::model($user,['method'=>'PATCH','action'=>['UsersController@update',$user->id]])}}--}}
{{--                                    <td>--}}
{{--                                        <div class="form-group">--}}
{{--                                    {!! Form::select('role_id',$roles,null,['class'=>'form-control col-md-6']) !!}--}}
{{--                                        </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        {!! Form::submit('Submit',['class'=>'btn btn-primary ']) !!}--}}
{{--                                    </div>--}}

{{--                                    </td>--}}
{{--                                {!! Form::close() !!}--}}

{{--                            </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}


{{--                    @endforeach--}}


{{--                </div>--}}
            </div>
        </div>
    </div>


@endsection
