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
        return redirect()->route('login');
    }
}
