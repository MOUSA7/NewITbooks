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

                @foreach($users as $user)

                    {{Form::model($user,['method'=>'PATCH','action'=>['UsersController@update',$user->id]])}}

                @endforeach
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>

                                <td>
                                    {!! Form::select('role_id',$roles,null,['class'=>'form-control col-md-6']) !!}
                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::submit('Submit',['class'=>'btn btn-primary ']) !!}
                                    </div>
                                </td>

                                <td>
                                </td>
                            </tr>


                        @endforeach
                        </tbody>
                    </table>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>


@endsection
