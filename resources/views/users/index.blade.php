@extends('layouts.app')

@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Hello {{Auth::user()->name}}</h1>
            </div>

        </div>
    </main>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-header">User Profile</h1>

            </div>
        </div>
    </div>


@endsection
