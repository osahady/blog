@extends('layouts.admin')

@section('content')
    <h1>Categories</h1> 
    <div class="row">
        <div class="col-sm-4">
            <form action="{{ route('categories.update', $cat->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $cat->name }}">
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Update Category</button>
                </div>
            </form>
            <form action="{{ route('categories.destroy', $cat->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
            @include('includes.form-error')
        </div>
        <div class="col-sm-8">
            <table class="table table-bordered table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($categories)
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at ? $category->created_at->diffForHumans() : "no date"  }}</td>
                                <td>{{ $category->updated_at ? $category->updated_at->diffForHumans() : "no date" }}</td>
                            </tr> 
                        @endforeach
                    @endif
                 
                  
                </tbody>
              </table>
        </div>

        
    </div>
@endsection
