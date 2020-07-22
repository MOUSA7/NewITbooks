@extends('layouts.app')

@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-sm-8">
                <h1>Hello {{Auth::user()->name}}</h1>
                @if(Auth::user()->role->id == 2 || Auth::user()->role->id == 1)
                    <a href="{{route('blog.create')}}" class="btn btn-primary ">Create Blog</a>
                    <a href="{{route('categories.index')}}" class="btn btn-warning">Categories</a>
                @endif
                        @if(Auth::user()->username)
                <a href="{{route('users.edit',Auth::user()->username)}}" class="btn btn-success">Setting users</a>
                            @endif
                    </div>
                        <div class="col-sm-4">
                    <img class="img-thumbnail" height="100" width="50%"
                         src="/images/{{Auth::user()->photo ?Auth::user()->photo->file :'s.png'}}" alt="">
                </div>
            </div>

            </div>
        </div>
    </main>

    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <h1 class="page-header">latest Blog</h1>
                @if($user = Auth::user())
                @if($user->blog)
                    <ul>
                    @foreach($blogs as $blog)
                            @if($blog->user_id == $user->id)

                         <li style="list-style-type: none">
                             <button class="btn btn-success btn-xs">{{$blog->status = 0 ?'Draft':'Publish'}}</button>
                             <a href="{{route('blog.show',$blog->slug)}}">{{$blog->title}}</a>
                         </li>
                            @endif
                        @endforeach
                    </ul>

                    @endif
                    @endif

            </div>

            <div class="col-sm-5">
                @include('partials.user_sidebar')
            </div>
        </div>
    </div>


@endsection
