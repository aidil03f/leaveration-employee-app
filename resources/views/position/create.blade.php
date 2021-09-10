@extends('layouts.app')

@section('content')
    
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Create Position</h3>
    </div>
    <!-- form start -->
    <form action="{{ route('position.store') }}" method="post" autocomplete="off">
        @method('POST')
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Code</label>
          <input type="text" name="position_code" class="form-control" placeholder="Position code">
          @error('position_code')
              <div class="text-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label>Position</label>
          <input type="text" name="name" class="form-control" placeholder="Position">
          @error('name')
              <div class="text-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
          <button type="submit" class="btn btn-outline-info">Create</button>
        <a href="{{ route('position.index') }}" class="btn btn-outline-warning">Back</a>
      </div>
    </form>
  </div>
@endsection