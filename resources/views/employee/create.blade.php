@extends('layouts.app')

@section('content')
    
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Create Employee</h3>
    </div>
    <!-- form start -->
    <form action="{{ route('employee.store') }}" method="post" autocomplete="off">
        @method('POST')
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label>NIK</label>
          <input type="text" name="nik" class="form-control" placeholder="Input NIK">
          @error('nik')
              <div class="text-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="name">
            @error('name')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Date of entry</label>
            <input type="date" name="date_of_entry" class="form-control">
            @error('date_of_entry')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option disabled selected>Choose One!</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @error('gender')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Department</label>
            <select name="department" class="form-control">
                <option disabled selected>Choose One!</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            @error('department')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Position</label>
            <select name="position" class="form-control">
                <option disabled selected>Choose One!</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
            @error('position')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option disabled selected>Choose One!</option>
                <option value="Contract">Contract</option>
                <option value="Permanent">Permanent</option>
            </select>
            @error('status')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Leaveration total</label>
            <input type="number" class="form-control" name="remainder-cuti" placeholder="... days">
            @error('remainder-cuti')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
          <button type="submit" class="btn btn-outline-info">Create</button>
        <a href="{{ route('employee.index') }}" class="btn btn-outline-warning">Back</a>
      </div>
    </form>
  </div>
@endsection