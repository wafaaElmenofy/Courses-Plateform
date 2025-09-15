<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User; 

class AutherController extends Controller
{
    // Regisrer

    public function showRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required | email | unique:User,email',
            'password' => 'required | min:8 | confirmed',
            'role' => 'rquired |in:student,instructor',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>Hash::make($request->password),
            'role' => $request->role,
        ]);
    }

    // login

    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request ->validate([
            'email' => 'required |email',
            'password' => 'required',
    
        ]);

        $user = User::where('email', $request->email)->first;

        if($user && Hash::check($request->password , $user->password)){
            Session::put('user',$user->id);
            Session::put('role',$user->role);

            if($user->role == 'instructor'){
                return redirect('/instructor/dashboard');
            }
            else{
                return redirect('/student/dashboard');
            }
        }
        else{
            return back()->withErrors(['login' => 'There was an error'])->withInput();
        }
    }

    public function logOut(){
        Session::flush();
        return redirect('/login');
    }
}
