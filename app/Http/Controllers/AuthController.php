<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
            // If the username is invalid
            alert()->error('Login Failed', 'Invalid username');
            return redirect()->back();
        }

        if (Hash::check($validated['password'], $user->password)) {
            // If the login is successful
            Auth::login($user);
            alert()->success('Login Successful', 'Welcome back!');
            return redirect()->route('dashboard');
        } else {
            // If the password is incorrect
            alert()->error('Login Failed', 'Invalid credentials');
            return redirect()->back();
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        alert()->success('Logged Out', 'You have been successfully logged out.');

        return redirect()->route('login');
    }

    public function userRegister(Request $request)
    {
        // Check if email already exists and show a SweetAlert
        if (User::where('email', $request->email)->exists()) {
            alert()->error('Registration Failed', 'Email already exists');
            return redirect()->back()->withInput();
        }

        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phoneNumber' => 'required|string',
            'password' => 'required|string|min:8|regex:/[0-9]/',
            'confirmPassword' => 'required|string|same:password',
        ], [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'phoneNumber.required' => 'Phone number is required.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.regex' => 'Password must contain at least one number.',
            'confirmPassword.same' => 'Confirm Password must match Password.',
        ]);

        // Create the user
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phoneNumber' => $validated['phoneNumber'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);

        // Success SweetAlert
        alert()->success('Registration Successful', 'Your account has been created successfully.');
        return redirect()->route('user-login');
    }


    public function userLogin(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Check if user exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // SweetAlert for invalid email
            alert()->error('Login Failed', 'Invalid email or password');
            return redirect()->back()->withInput();
        }

        // Check the password
        if (Hash::check($validated['password'], $user->password)) {
            // SweetAlert for successful login
            Auth::login($user);
            alert()->success('Login Successful', 'Welcome back!');
            return redirect()->route('index');
        } else {
            // SweetAlert for invalid password
            alert()->error('Login Failed', 'Invalid email or password');
            return redirect()->back()->withInput();
        }

        $response = LaravelTurnstile::validate();

        if (! $response['success']) {
            return redirect()->back()->withInput();
        }
    }

    public function userLogout(Request $request)
    {
        Auth::logout();

        alert()->success('Logged Out', 'You have been successfully logged out.');

        return redirect()->route('index');
    }
}
