
@section('meta_title')
    {{$blog->meta_title}} - New It Book Project
@endsection

@section('meta_desc')
    {{$blog->meta_desc}} - New It Book Description
@endsection

@section('meta_author')
    {{Auth::user() ? Auth::user()->name : 'User' }} - Author
@endsection
