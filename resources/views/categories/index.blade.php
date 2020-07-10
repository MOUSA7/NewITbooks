@extends('layouts.app')

@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Latest Categories</h1>
            </div>
            <div class="col-sm-12">


                @foreach($categories as $category)

                    @if($category->blog->count()>0)
                        <article>
                            <h3><a href="{{route('categories.show',$category->slug)}}">{{$category->name}}</a></h3>
                        </article>
                    @endif

                @endforeach

            </div>


        </div>
    </main>


@endsection
