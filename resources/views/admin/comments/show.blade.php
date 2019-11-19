@extends('layouts.admin')

@section('content')
    

    @if (count($comments)>0)
    <h1>Comments</h1>
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Author</th>
            <th scope="col">Email</th>
            <th scope="col">Comment</th>
            <th>Link</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <th scope="row">{{ $comment->id }}</th>
                    <td>{{ $comment->author }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ $comment->body }}</td>
                    <td><a class="btn btn-outline-info" href="{{ route('home.post', $comment->post->id) }}">{{ $comment->post->title }}</a></td>
                    <td>
                        @if ($comment->is_active == 1)
                            <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-warning">Un-approve</button>
                                </div>

                            </form>
                        @else
                            <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-success">Approve</button>
                                </div>

                            </form>
                        @endif
                    </td>

                    <td>
                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          
          
        </tbody>
      </table> 
    @else
        <h1 class="text-danger text-center">No Comments</h1>
    @endif
    
@stop