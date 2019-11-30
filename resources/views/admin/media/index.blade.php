@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
    @if ($photos)
      <form action="{{ route('del') }}" method="post" class="form-inline"> 
        @csrf
        @method('DELETE')  
        <div class="form-group">
          <select name="checkBoxArraySelect" class="form-control">
            <option value="delete">Delete</option>
          </select>
        </div> 
        <div class="form-group">
          <input type="submit" class="btn btn-primary ml-3" name="delete_all" value="Go">
        </div>
        <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center"><input type="checkbox" name="" id="options"></th>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Name</th>
                <th class="text-center" scope="col">Created</th>
                <th class="text-center" scope="col">Updated</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($photos as $photo)
                    <tr>
                        <td class="text-center align-middle"><input type="checkbox" name="checkBoxArrayForeach[]" value="{{ $photo->id }}" class="checkBoxes"></td>
                        <th class="text-center align-middle" scope="row">{{ $photo->id }}</th>
                        <td class="text-center align-middle"><img src="{{ $photo->file }}" alt="" width="100"></td>
                        <td class="align-middle text-center">{{ $photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                        <td class="align-middle text-center">{{ $photo->updated_at ? $photo->updated_at->diffForHumans() : 'no date'}}</td>
                        <td>
                          {{-- <div class="form-group">
                            
                            <input type="submit" name="delete_single[{{ $photo->id }}]" value="Delete" class="btn btn-danger">
                          </div> --}}
                          {{-- <form action="{{ route('media.destroy', $photo->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form> --}}
                        </td>
                    </tr> 
                @endforeach
              
              
            </tbody>
          </table>
        </form>
    @endif

@stop

@section('scripts')
<script>
  $(document).ready(function(){
      $('#options').click(function(){
        if(this.checked){
          $('.checkBoxes').each(function(){
            this.checked = true;
          });
        }else{
          $('.checkBoxes').each(function(){
            this.checked = false;
          });
        }


        console.log('it works')
      });
    });
</script>
    
@endsection