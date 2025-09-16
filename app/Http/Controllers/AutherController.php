<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AutherController extends Controller
{
    // Show register form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:student,instructor',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/login')->with('success', 'Account created successfully! Please login.');
    }

    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Store user data in session
            Session::put('user_id', $user->id);
            Session::put('user_role', $user->role);

            return redirect('/dashboard');
        }

        // If invalid login
        return back()->withErrors(['login' => 'Invalid email or password'])->withInput();
    }

    // Handle logout
    public function logOut()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Logged out successfully!');
    }

    // Display the user's dashboard based on their role
    public function dashboard()
    {
        $user_id = Session::get('user_id');
        if (!$user_id) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        $user = User::find($user_id);

        if ($user->role === 'student') {
            $courses = $user->enrolledCourses;
            return view('dashboard', [
                'role' => 'student',
                'name' => $user->name,
                'courses' => $courses,
            ]);
        } elseif ($user->role === 'instructor') {
            $mycourses = $user->createdCourses;
            return view('dashboard', [
                'role' => 'instructor',
                'name' => $user->name,
                'mycourses' => $mycourses,
            ]);
        }
    }
}
