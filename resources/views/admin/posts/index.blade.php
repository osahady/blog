@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">User</th>
            <th scope="col">Category</th>
            
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">View</th>
            <th scope="col">Comments</th>
            <th scope="col">Created </th>
            <th scope="col">Updated</th>
          </tr>
        </thead>
        <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td><a href="{{ route('posts.edit', $post->id) }}"> <img src="{{ $post->photo ? $post->photo->file : 'images/icon-pad.png' }}" alt="no picture" height="50px"></a></td>
                        <td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->user->name }}</a></td>
                        <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                       
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->body, 10) }}</td>
                        <td><a class="btn btn-outline-info" href="{{ route('home.post', $post->id) }}">View Post</a></td>
                        <td><a href="{{ route('comments.show', $post->id) }}">Comments</a></td>
                        <td>{{ $post->created_at->diffForhumans() }}</td>
                        <td>{{ $post->updated_at->diffForhumans() }}</td>

                    </tr>
                @endforeach 
            @endif
            
           
         
        </tbody>
      </table>
@endsection