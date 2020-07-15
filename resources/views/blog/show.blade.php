@extends('layouts.app')

@include('partials.meta_dynamic')

@section('content')

    <main class="container">
        <div class="container-fluid">
            <article>
                <div class="jumbotron">

                        @if($blog->photo)
                            <img src="/images/{{$blog->photo ? $blog->photo->file : 'Not Found Image'}}" alt="{{Str::limit($blog->title)}}"
                                  style="max-width: 100%">
                            <br/>
                        @endif

                    <h1>{{$blog->title}}</h1>
                            @if(Auth::check())
                            @if(Auth::user() && Auth::user()->role_id == 1 OR Auth::user()->id == $blog->user_id)

                    <a href="{{route('blog.edit',$blog->id)}}" style="float:right" class="btn btn-success">Edit Blog</a>
                    <a href="{{action('BlogController@delete',$blog->id)}}" style="float:right" class="btn btn-danger">Delete
                        Blog</a>
                            @endif
                                @endif
                </div>
                <div class="col-sm-8 col-sm-offset-2">

                    <p>{!! $blog->body !!}</p>

                    @foreach($blog->category as $category)
                        <p><a href="{{route('categories.show',$category->slug)}}">{{$category->name}}</a></p>
                    @endforeach

                </div>
            </article>
        </div>
        <aside>
            <div id="disqus_thread"></div>
            <div id="disqus_thread"></div>
            <script>

                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://newitbooks-2.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
        </aside>
    </main>

@endsection
