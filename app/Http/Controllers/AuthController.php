<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        if (User::where('username', $request->username)->exists()) {
            return response()->json([
                'message' => 'Username already exists'
            ], 400);
        }

        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'role' => 'admin',
        ]);

        return response()->json([
            'message' => 'User created successfully'
        ], 201);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Invalid username'
            ], 401);
        }

        if (Hash::check($validated['password'], $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function userRegister(Request $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'Email already exists')->withInput();
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phoneNumber' => 'required|string',
            'password' => 'required|string|min:8|regex:/[0-9]/',
            'confirmPassword' => 'required|string|same:password',
        ], [
            'confirmPassword.same' => 'The confirm password must match the password.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.regex' => 'The password must contain at least one number.'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('user-login')->with('success', 'User created successfully');
    }

    public function userLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid email or password')->withInput();
        }

        if (Hash::check($validated['password'], $user->password)) {
            Auth::login($user);
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password')->withInput();
        }
    }
}
