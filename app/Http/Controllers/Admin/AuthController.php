<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginFrom()
    {
        if(Auth::check()){
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->role == 'teacher') {
                return redirect()->route('teacher.dashboard');
            }

            if (Auth::user()->role == 'student') {
                return redirect()->route('student.dashboard');
            }
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password'=> 'required',
        ]);


        $user = User::where('email',$request->email)->first();

        if (!$user){
            return back()->with('error',"mail doesn't exist");
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', "Password incorrect");
        }

        Auth::login($user);

        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role == 'teacher') {
            return redirect()->route('teacher.dashboard');
        }

        if ($user->role == 'student') {
            return redirect()->route('student.dashboard');
        }
      
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function registerFrom()
    {
        return view('auth.signUp');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password'  => 'required|confirmed|min:6',
        ]);


        User::saveStudentFrom($request);

        return redirect()->route('login')->with('success', 'Registration Successful');
    }


}