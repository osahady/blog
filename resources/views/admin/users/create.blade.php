@extends('layouts.admin')

@section('content')
    <h1>Create users</h1>
    <form method="POST" action="{{ action('AdminUsersController@store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
          <label for="name">Email:</label>
          <input type="email" class="form-control" name="email">
        </div>


        <div class="form-group">
          <label for="role_id">Role:</label>
          <select name="role_id"  class="form-control">
           <option value=""selected disabled>Choose a Role ...</option>
            @foreach ($roles as $role)
              <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
            
           
          </select>
        </div>


        <div class="form-group">
          <label for="is_active">Status:</label>
          <select name="is_active"  class="form-control">
            <option selected disabled>Choose . . .</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
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

        <button type="submit" class="btn btn-primary">Create User</button>
    </form>

   @include('includes.form-error')
@endsection