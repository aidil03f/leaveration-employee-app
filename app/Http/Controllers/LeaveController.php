<?php

namespace App\Http\Controllers;

use App\Models\{Leave,Employee};
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    
    public function index()
    {
       $leaves = Leave::get();
       return view('leave.index',compact('leaves'));
    }

    public function submit()
    {
        return view('leave.submit',[
            'employees' => Employee::get()
        ]);
    }

    public function store(Request $request)
    {
      
       request()->validate([
           'name' => 'required',
           'start-date' => 'required|date',
           'end-date' => 'required|date',
           'duration' => 'required|numeric',
           'description' => 'required'
       ]);
 
       $employee = Employee::find(request('name'));
       $duration = $employee->count_leave - request('duration');

       if($duration <= 0){
           $status = 'Rejected';
       }else if($duration > 0){
           $status = 'Pending';
           $employee->update(['count_leave' => $duration]);
       }

       Leave::create([
            'employee_id' => request('name'),
            'start_date' => request('start-date'),
            'end_date' => request('end-date'),
            'count_leave' =>  request('duration'),
            'description' => request('description'),
            'status' => $status
       ]);

       return redirect()->route('leave.index');
    }

    public function review($id)
    {
        return view('leave.review',[
            'review' => Leave::findOrFail($id),
            'employees' => Employee::get()
        ]);
    }

    public function update(Request $request,$id)
    {
        $leaves = Leave::findOrFail($id);
        
        if(request('status') == 'Rejected'){
            $employee = Employee::find($leaves->employee->id);
            $employee->update(['count_leave' => $leaves->employee->count_leave + $leaves->count_leave]);
            $leaves->update(['status' => 'Rejected']);
        }else if(request('status') == 'Approved'){
            $leaves->update(['status' => 'Approved']);
        }
        return redirect()->route('leave.index');
    }

    public function destroy($id)
    {
        Leave::find($id)->delete();
        return redirect()->route('leave.index');

    }
}
