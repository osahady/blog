@extends('layouts.admin')

@section('content')
    
    @if (Session::has('deleteReplyMessage'))
        <div class="alert alert-danger">{{ session('deleteReplyMessage') }}</div>
    @endif
    @if (count($replies) > 0 )
        <h1>replies</h1>
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">reply</th>
                <th>Link</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($replies as $reply)
                    <tr>
                        <th scope="row">{{ $reply->id }}</th>
                        <td>{{ $reply->author }}</td>
                        <td>{{ $reply->email }}</td>
                        <td>{{ $reply->body }}</td>
                        <td><a class="btn btn-outline-info" href="{{ route('home.post', $reply->comment->post->id) }}">{{ $reply->comment->post->title }}</a></td>
                        <td>
                            @if ($reply->is_active == 1)
                                <form method="POST" action="{{ route('replies.update', $reply->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="is_active" value="0">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-warning">Un-approve</button>
                                    </div>

                                </form>
                            @else
                                <form method="POST" action="{{ route('replies.update', $reply->id) }}">
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
                            <form method="POST" action="{{ route('replies.destroy', $reply->id) }}">
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
        <h1 class="text-danger text-center">No replies</h1>
    @endif
    
@stop