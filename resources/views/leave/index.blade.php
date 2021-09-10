@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Cuti</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">leaveration</li>
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
          @if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Employee')
          <div class="card-header">
                <a href="{{ route('leave.submit') }}" class="btn btn-primary btn-sm" title="submit"><i class="fas fa-paper-plane"></i> Submit</a>
          </div>
          @endif
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>Up to</th>
                <th>Duration</th>
                <th>leaveration</th>
                <th>Status</th>
                @if(auth()->user()->role == 'Admin' || auth()->user()->role == 'HR-Staff')
                  <th>Action</th>
                @endif
              </tr>
              </thead>
              <tbody>
                @foreach ($leaves as $leave)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $leave->employee->name }}</td>
                        <td>{{ date('d-m-Y', strtotime($leave->start_date)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($leave->end_date)) }}</td>
                        <td>{{ $leave->count_leave }} days</td>
                        @if($leave->employee->count_leave <= 0)
                            <td>empty</td>
                        @elseif($leave->employee->count_leave > 0)
                            <td>{{ $leave->employee->count_leave }} days</td>
                        @endif
                        <td>{{ $leave->status }}</td>
                        <td>
                            <form action="{{ route('leave.delete',$leave) }}" method="post">
                              @if(auth()->user()->role == 'Admin' || auth()->user()->role == 'HR-Staff')
                                <a href="{{ route('leave.review',$leave) }}" class="btn btn-warning btn-sm" title="review"><i class="fas fa-edit"></i> Review</a>
                              @endif
                              @if($leave->status == 'Rejected')
                                    @method('delete')
                                    @csrf
                                    <button type="submit" onclick="return confirm('are you sure ?')" class="btn btn-danger btn-sm" title="delete"><i class="fas fa-trash"></i></button>
                              @endif
                            </form>
                        </td>
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