@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Department</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Department</li>
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
          <div class="card-header">
            <a href="{{ route('department.create') }}" class="btn btn-primary">Add</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Code</th>
                <th>Department</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $department->department_code }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->created_at }}</td>
                        <td>{{ $department->updated_at }}</td>
                        <td>
                            <form action="{{ route('department.delete',$department) }}" method="post">
                                <a href="{{ route('department.edit',$department) }}" class="btn btn-warning btn-sm" title="edit"><i class="fas fa-edit"></i></a>
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('are you sure ?')" class="btn btn-danger btn-sm" title="delete"><i class="fas fa-trash"></i></button>
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