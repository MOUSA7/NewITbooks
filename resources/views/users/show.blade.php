@extends('layouts.app')

@section('content')

    <main class="container">

        <div class="container-fluid col-sm-12">

            <div class="jumbotron">
                <div class="row">
                    <div class="col-sm-8">
                        <h1>Hello {{$user->name}}</h1>
                        <h4 style="color:darkgreen">{{$user->role->name}}</h4>
                        <button class="btn btn-primary btn-xs">{{$user->blog->count()}} Blog</button>

                    </div>

                    <br>
                    <div class="col-sm-4">
                        <img class="img-thumbnail" height="100" width="50%"
                             src="/images/{{$user->photo ?$user->photo->file :'s.png'}}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
                <br>
                <hr>
                    @if($user->blog->count() > 0)
                    <h1>latest Blog by
                        <a href="{{route('users.show',$user->username)}}">
                            <small>{{$user->name}}</small>
                            <hr>
                        </a>
                    </h1>
                        <ul>
                            @foreach($user->blog->reverse() as $blog)
                                <h3><a href="{{route('blog.show',$blog->slug)}}">{{$blog->title}}</a></h3>
                                <p>{!! Str::limit($blog->body,500) !!}
                                    <a href="{{route('blog.show',$blog->slug)}}">Read more</a>
                                </p>

                                @if($blog->user)
                                    <p>
                                          Posted On <strong>
                                            <i class="fa fa-btn fa-clock-o"> {{$blog->created_at->diffForHumans()}}</i></strong>
                                        @foreach($blog->category as $category)
                                            <i class="fa fa-btn fa-cubes"> <a
                                                    href="{{route('categories.show',$category->slug)}}">{{$category->name}}</a></i> @endforeach
                                    </p>
                                @endif
                                <br>
                            @endforeach
                        </ul>

                    @endif

            </div>
            <div class="col-sm-6">
                @include('partials.user_sidebar')
            </div>
        </div>
        </div>
    </main>



@endsection
