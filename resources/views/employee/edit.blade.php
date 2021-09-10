@extends('layouts.app')

@section('content')
    
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Edit Employee</h3>
    </div>
    <!-- form start -->
    <form action="{{ route('employee.update',$employee) }}" method="post" autocomplete="off">
        @method('PUT')
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label>NIK</label>
          <input type="text" name="nik" value="{{ $employee->nik }}" class="form-control" placeholder="Input NIK">
          @error('nik')
              <div class="text-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $employee->name }}" class="form-control" placeholder="name">
            @error('name')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Date of entry</label>
            <input type="date" name="date_of_entry" value="{{ $employee->date_of_entry }}" class="form-control">
            @error('date_of_entry')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option {{ $employee->gender == 'Male' ? 'selected' : ''}} value="Male">Male</option>
                <option {{ $employee->gender == 'Female' ? 'selected' : ''}} value="Female">Female</option>
            </select>
            @error('gender')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Department</label>
            <select name="department" class="form-control">
                @foreach ($departments as $department)
                    <option {{ $department->id == $employee->department_id ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            @error('department')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Position</label>
            <select name="position" class="form-control">
                @foreach ($positions as $position)
                    <option {{ $position->id == $employee->position_id ? 'selected' : '' }} value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
            @error('position')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option {{ $employee->status == 'Contract' ? 'selected' : ''}} value="Contract">Contract</option>
                <option {{ $employee->status == 'Permanent' ? 'selected' : ''}} value="Permanent">Permanent</option>
            </select>
            @error('status')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Remainder cuti</label>
            <input type="number" class="form-control" value="{{ $employee->count_leave }}" name="remainder-cuti" placeholder="... days">
            @error('remainder-cuti')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
          <button type="submit" class="btn btn-outline-info">Update</button>
        <a href="{{ route('employee.index') }}" class="btn btn-outline-warning">Back</a>
      </div>
    </form>
  </div>
@endsection