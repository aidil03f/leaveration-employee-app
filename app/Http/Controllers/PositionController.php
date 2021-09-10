<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    
    public function index()
    {
       $positions = Position::get();
       return view('position.index',compact('positions'));
    }

    public function create()
    {
        return view('position.create');
    }

    public function store(Request $request)
    {
       request()->validate([
           'position_code' => 'required',
           'name' => 'required'
       ]);

       Position::create([
            'position_code' => request('position_code'),
            'name' => request('name')
       ]);

       return redirect()->route('position.index');
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        return view('position.edit',compact('position'));
    }

    public function update(Request $request,$id)
    {
        request()->validate([
            'position_code' => 'required',
            'name' => 'required'
        ]);

        $position = Position::findOrFail($id);
        $position->update([
            'position_code' => request('position_code'),
            'name' => request('name')
        ]);

        return redirect()->route('position.index');
    }

    public function destroy($id)
    {
        $position = Position::findOrFail($id)->delete();
        return redirect()->route('position.index');

    }
}
