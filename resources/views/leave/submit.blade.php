@extends('layouts.app')

@section('content')
    
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Submission Cuti</h3>
    </div>
    <!-- form start -->
    <form action="{{ route('leave.store') }}" method="post" autocomplete="off">
        @method('POST')
        @csrf
      <div class="card-body">
        
        <div class="form-group">
            <label>Name</label>
            <select name="name" id="name" class="form-control">
                <option disabled selected>Choose One!</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->nik }}&ensp;{{ $employee->name }}</option>
                @endforeach
            </select>
            @error('name')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Start Date</label>
            <input type="date" name="start-date" class="form-control">
            @error('start-date')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Up to</label>
            <input type="date" name="end-date" class="form-control">
            @error('end-date')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Duration</label>
            <input type="number" class="form-control" name="duration" placeholder="... days">
            @error('duration')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="description" placeholder="write something">
            @error('description')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
          <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane"></i> Submit</button>
        <a href="{{ route('leave.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
@endsection
