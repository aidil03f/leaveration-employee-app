<?php

namespace App\Http\Controllers;

use App\Models\{Employee,Department,Position};
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    public function index()
    {
       $employees = Employee::get();
       return view('employee.index',compact('employees'));
    }

    public function create()
    {
        return view('employee.create',[
            'departments' => Department::get(),
            'positions' => Position::get()
        ]);
    }

    public function store(Request $request)
    {
       request()->validate([
           'nik' => 'required',
           'name' => 'required',
           'date_of_entry' => 'required',
           'gender' => 'required',
           'department' => 'required',
           'position' => 'required',
           'status' => 'required',
           'remainder-cuti' => 'required'
       ]);

       Employee::create([
            'nik' => request('nik'),
            'name' => request('name'),
            'date_of_entry' => request('date_of_entry'),
            'gender' => request('gender'),
            'department_id' => request('department'),
            'position_id' => request('position'),
            'status' => request('status'),
            'count_leave' => request('remainder-cuti')
       ]);

       return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        return view('employee.edit',[
            'employee' => Employee::findOrFail($id),
            'departments' => Department::get(),
            'positions' => Position::get()
        ]);
    }

    public function update(Request $request,$id)
    {
        request()->validate([
            'nik' => 'required',
            'name' => 'required',
            'date_of_entry' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'position' => 'required',
            'status' => 'required',
            'remainder-cuti' => 'required'
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update([
            'nik' => request('nik'),
            'name' => request('name'),
            'date_of_entry' => request('date_of_entry'),
            'gender' => request('gender'),
            'department_id' => request('department'),
            'position_id' => request('position'),
            'status' => request('status'),
            'count_leave' => request('remainder-cuti')
        ]);

        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id)->delete();
        return redirect()->route('employee.index');

    }
}
