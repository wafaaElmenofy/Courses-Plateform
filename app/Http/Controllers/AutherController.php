<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AutherController extends Controller
{
    
    public function showRegister()
    {
        return view('auth.register');
    }

    
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

    
    public function showLogin()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        $user = User::where('email', $request->email)->first();

        
        if ($user && Hash::check($request->password, $user->password)) {




            
        $userid=session('user_id');
        $userrole=session('user_role');
        $user=User::find($userid);
        //$user=Auth::user();
        if($userrole==='student'){
        //if($user->role==='student'){
          $courses = $user->enrolledCourses;  
          return view ('dashboard',[
            'role'=>'student',
            'name'=>$user->name,
             'courses'=>$courses,
          ]);
        }
        elseif ($userrole==='instructor'){
         // elseif   ($user->role ==='instructor'){
            $mycourses=$user->createdCourses;
           return view ('dashboard',[
            'role'=>'instructor',
            'name'=>$user->name,
            'mycourses'=>$mycourses
           ]); 
        }
        else {
            return redirect ('login');
        }
    
}
            
        //     Session::put('user', $user->id);
        //     Session::put('role', $user->role);

            
        //     if ($user->role == 'instructor') {
        //         return redirect('/instructor/dashboard');
        //     } else {
        //         return redirect('/student/dashboard');
        //     }
        // } else {
            
        //     return back()->withErrors(['login' => 'Invalid email or password'])->withInput();
        // }
    }

    // logout
    public function logOut()
    {
        Session::flush(); 
        return redirect('/login')->with('success', 'Logged out successfully!');
    }
}
