<?php

namespace App\Http\Controllers;

use App\Models\CourseModule;
use App\Models\CourseModuleLesson;
use App\Models\CourseModuleSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.Home');
    }

    public function trainers()
    {
        return view('front.trainers');
    }

    public function redirectByRole()
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


    public function courses()
    {
        return view('front.courses',[
            'courses' => CourseModule::where('status', 0)->get(),
        ]);
    }

    public function singlePage($id)
    {
        $course = CourseModule::with([
            'sections',
            'sections.lessons'
        ])->findOrFail($id);

        return view('front.singlepage', compact('course'));
    }

}
