@extends('layouts.admin')

@section('content')
    <h1>Edit user</h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{{ $user->photo ? $user->photo->file : 'https://via.placeholder.com/400' }}" alt="" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-9">
            <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
        
                <div class="form-group">
                  <label for="name">Email:</label>
                  <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>
        
        
                <div class="form-group">
                  <label for="role_id">Role:</label>
                  <select name="role_id"  class="form-control">
                   <option value=""selected disabled>Choose a Role ...</option>
                    @foreach ($roles as $role)
                        @if ($user->role_id == $role->id)
                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                        @else
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endif
                        
                    @endforeach
                    
                   
                  </select>
                </div>
        
        
                <div class="form-group">
                  <label for="is_active">Status:</label>
                  <select name="is_active"  class="form-control">
                    <option selected disabled>Choose . . .</option>
                    @if ($user->is_active)
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    @else
                        <option value="1">Active</option>
                        <option value="0" selected>Inactive</option>
                    @endif
                    
                  </select>
                </div>
        
                <div class="form-group">
                    <label for="photo_id">File:</label>
                    <input type="file"  name="photo_id">
                </div>
              
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
        <div class="form-row">
            <div class="col">
                    <button type="submit" class="btn btn-primary form-control">Update!</button>
            </div>
                
            </form>
        
            <form action="{{ route('users.destroy', $user->id) }}" method="post" class="col">
                @csrf
                @method('DELETE')
                <div class="form-group ">
                    <button type="submit" class="btn btn-danger form-control">Delete</button>
                </div>
            </form>
        </div>

            
        </div>
    </div>

   @include('includes.form-error')
@endsection