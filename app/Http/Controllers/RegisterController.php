<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', ['title' => 'Login', 'active' => 'login']);
    }

    public function store(Request $request)
    {
        // dd($request);

        $validatedData = $request->validate([

            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max: 255', 'unique:users'],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|max:255'

        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        // $request->session()->flash('success', 'Registrasi berhasil, silahkan Login!');
        return  redirect('/login')->with('success', 'Registrasi berhasil, silahkan Login!');
    }
}
