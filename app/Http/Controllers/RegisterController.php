<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Register.index', [
            'title' => 'Sign Up',
            'active' => 'register',
        ]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|min:3|max:255|unique:users',
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:255',
        'role' => 'required|in:user,admin',
    ]);        

    $validatedData['password'] = Hash::make($validatedData['password']);

    // Pastikan input 'role' tersedia dalam request
    if ($request->has('role')) {
        $validatedData['role'] = $request->input('role');
    } else {
        // Set default role jika tidak tersedia
        $validatedData['role'] = 'user';
    }

    User::create($validatedData);

    $request->session()->flash('success', 'Registration successful! Please Login');

    return redirect('/login');
}
}
