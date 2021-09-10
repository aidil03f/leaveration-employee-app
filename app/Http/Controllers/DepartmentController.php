<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    
    public function index()
    {
       $departments = Department::get();
       return view('department.index',compact('departments'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
       request()->validate([
           'department_code' => 'required',
           'name' => 'required'
       ]);

       Department::create([
            'department_code' => request('department_code'),
            'name' => request('name')
       ]);

       return redirect()->route('department.index');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('department.edit',compact('department'));
    }

    public function update(Request $request,$id)
    {
        request()->validate([
            'department_code' => 'required',
            'name' => 'required'
        ]);

        $department = Department::findOrFail($id);
        $department->update([
            'department_code' => request('department_code'),
            'name' => request('name')
        ]);

        return redirect()->route('department.index');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id)->delete();
        return redirect()->route('department.index');

    }
}
