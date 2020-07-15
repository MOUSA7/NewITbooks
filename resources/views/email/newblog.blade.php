<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Blog Posted</title>
</head>
<body style="padding: 0 10%">
<h1 style="text-align: center; background-color: #333844;color: white">New It Blog</h1>
<blockquote>

<h2> Hi <a href="{{route('users.show',$user->username)}}"></a>{{$user->name}}</h2>
<h3>New It WebSite With Blog {{$blog->title}} has been posted blog in NewItBook</h3>
    <h4>Category : @foreach($c as $category)
        <span><a href="{{route('categories.show',$category->slug)}}">{{$category->name}}</a></span>
                   @endforeach</h4>
</blockquote>
<h2 style="text-align: center;background-color: #1d643b;color: white "></h2>
</body>
</html>
