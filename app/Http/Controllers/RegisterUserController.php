<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterUserController extends Controller
{

    public function __invoke(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create([
            'name' => request('name'),
            'email' =>  request('email'),
            'password' =>  bcrypt(request('password')),
            'role' => request('role'),
        ]);

        return response()->json(['status' => 200]);
    }
}
