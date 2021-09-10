@extends('layouts.app')

@section('content')
    
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Review</h3>
    </div>
    <!-- form start -->
    <form action="{{ route('leave.update',$review) }}" method="post" autocomplete="off">
        @method('PUT')
        @csrf
      <div class="card-body">
        
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" value="{{ $review->employee->nik }}&ensp;{{ $review->employee->name }}" readonly>
        </div>

        <div class="form-group">
            <label>Remainder Cuti</label>
            <input type="text" class="form-control" value="{{ $review->employee->count_leave }} days" readonly>
        </div>

        <div class="form-group">
            <label>Start Date</label>
            <input type="date" name="start_date" value="{{ $review->start_date }}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label>Up to</label>
            <input type="date" name="end_date" value="{{ $review->end_date }}" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Duration</label>
            <input type="text" class="form-control" name="duration" value="{{ $review->count_leave }} days" readonly>
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="description" value="{{ $review->description }}" readonly>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option {{ $review->status == 'Pending' ? 'selected' : ''}} value="Pending">Pending</option>
                <option {{ $review->status == 'Approved' ? 'selected' : ''}} value="Approved">Approved</option>
                <option {{ $review->status == 'Rejected' ? 'selected' : ''}} value="Rejected">Rejected</option>
            </select>
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
