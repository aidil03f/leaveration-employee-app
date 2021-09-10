@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Employees</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Employees</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          @if(auth()->user()->role == 'HR-Staff' || auth()->user()->role == 'Admin')
            <div class="card-header">
              <a href="{{ route('employee.create') }}" class="btn btn-primary">Add</a>
            </div>
          @endif
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>NIK</th>
                <th>Name</th>
                <th>Date of entry</th>
                <th>Gender</th>
                <th>Department</th>
                <th>Position</th>
                <th>Status</th>
                <th>Remainder leaveration</th>
                @if(auth()->user()->role == 'Admin')
                  <th>Action</th>
                @endif
              </tr>
              </thead>
              <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->nik }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ date('d-m-Y', strtotime($employee->date_of_entry)) }}</td>
                        <td>{{ $employee->gender }}</td>
                        <td>{{ $employee->department->name }}</td>
                        <td>{{ $employee->position->name }}</td>
                        <td>{{ $employee->status }}</td>
                        @if($employee->count_leave <= 0)
                          <td>empty</td>
                        @elseif($employee->count_leave > 0)
                          <td>{{ $employee->count_leave }} days</td>
                        @endif
                        @if(auth()->user()->role == 'Admin')
                          <td>
                              <form action="{{ route('employee.delete',$employee) }}" method="post">
                                  <a href="{{ route('employee.edit',$employee) }}" class="btn btn-warning btn-sm" title="edit"><i class="fas fa-edit"></i></a>
                                  @method('delete')
                                  @csrf
                                  <button type="submit" onclick="return confirm('are you sure ?')" class="btn btn-danger btn-sm" title="delete"><i class="fas fa-trash"></i></button>
                              </form>
                          </td>
                        @endif
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
@endsection