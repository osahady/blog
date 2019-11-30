@extends('layouts.blog-home')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @yield('404')
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
        </h1>

        <!-- First Blog Post -->

        @if ($posts)
            @foreach ($posts as $post)
            <h2>
                <a href="#">{{ $post->title }}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{ $post->user->name }}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>  {{ $post->created_at->diffForHumans() }}</p>
            <hr>
            <img class="img-responsive" src="{{ $post->photo->file }}" alt="">
            <hr>
            <p> {!! str_limit($post->body, 50) !!} </p>
            <a class="btn btn-primary" href="/post/{{ $post->slug }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    
            <hr>
    
            @endforeach
        @endif
       
  
   
        <!-- Pagination -->
        <div class="text-center">

            {{ $posts->render() }}
           
        </div>
           

    </div>

    <!-- Blog Sidebar Widgets Column -->
@include('includes.front_sidebar')
</div>
<!-- /.row -->
@endsection
