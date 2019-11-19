@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection

@section('content')
    <h1>Upload</h1>
    <form action="{{ route('media.store') }}" method="post" class="dropzone">
        @csrf
        
    </form>
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection