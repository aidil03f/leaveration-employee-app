@extends('layouts.app')

@section('content')
    
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Create Department</h3>
    </div>
    <!-- form start -->
    <form action="{{ route('department.store') }}" method="post" autocomplete="off">
        @method('POST')
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Code</label>
          <input type="text" name="department_code" class="form-control" placeholder="Department code">
          @error('department_code')
              <div class="text-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label>Department</label>
          <input type="text" name="name" class="form-control" placeholder="department">
          @error('name')
              <div class="text-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
          <button type="submit" class="btn btn-outline-info">Create</button>
        <a href="{{ route('department.index') }}" class="btn btn-outline-warning">Back</a>
      </div>
    </form>
  </div>
@endsection