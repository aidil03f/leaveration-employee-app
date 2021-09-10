@extends('layouts.app')

@section('content')
    
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Edit Position</h3>
    </div>
    <!-- form start -->
    <form action="{{ route('position.update',$position) }}" method="post" autocomplete="off">
        @method('PUT')
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Code</label>
          <input type="text" name="position_code" value="{{ $position->position_code }}" class="form-control" placeholder="Position code">
          @error('position_code')
              <div class="text-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label>Position</label>
          <input type="text" name="name" value="{{ $position->name }}" class="form-control" placeholder="Position">
          @error('name')
              <div class="text-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
          <button type="submit" class="btn btn-outline-info">Update</button>
        <a href="{{ route('position.index') }}" class="btn btn-outline-warning">Back</a>
      </div>
    </form>
  </div>
@endsection