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
            <th scope="col">Created </th>
            <th scope="col">Updated</th>
          </tr>
        </thead>
        <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td><img src="{{ $post->photo ? $post->photo->file : 'images/icon-pad.png' }}" alt="no picture" height="50px"></td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->category_id }}</td>
                       
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->created_at->diffForhumans() }}</td>
                        <td>{{ $post->updated_at->diffForhumans() }}</td>

                    </tr>
                @endforeach 
            @endif
            
           
         
        </tbody>
      </table>
@endsection