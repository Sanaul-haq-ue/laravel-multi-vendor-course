<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // <--- add this line
use App\Models\CheckOut;
use App\Models\CourseModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index_admin()
    {
        return view('back.admin.adminDashboard');
    }

    public function index_student(){

        $owneds = CheckOut::with('courseModule.creator')
            ->where('user_id', Auth::user()->id)
            ->where('status', 1)
            ->get();
        $pendings = CheckOut::with('courseModule.creator.image')
            ->where('user_id', Auth::id())
            ->where('status', 0)
            ->get();

        return view('back.student.studentDashboard', compact('owneds','pendings'));
    }

    public function index_teacher(){
        $course = CourseModule::where('created_by', Auth::user()->id)
            ->get();

        $approves = CheckOut::where('teacher_created_by_id', Auth::id())
            ->get();

        return view('back.teacher.teacherDashboard',compact('course','approves'));
    }
}
