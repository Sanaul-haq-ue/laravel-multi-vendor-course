<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CheckOut;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\CourseModuleExtra;
use App\Models\CourseModuleSection;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function subject(){

        return view('back.subject.subject',[
            'subjects' => Subject::all(),
        ]);
    }

    public function subjectFrom(){
        return view('back.subject.subjectFrom');
    }

    public function subjectSubmit(Request $request){
        
        $request->validate([
            'subject' => 'required|string|max:255',
            'status'  => 'required|in:0,1',
        ]);

        Subject::saveSubject($request);

        return back()->with('error', 'hoooo');
    }

    public function subjectEdit(Request $request){
        return view('back.subject.subjectEdit',[
            'subject' => Subject::find($request->id),
        ]);
    }

    public function subjectUpdate(Request $request, $id){
        Subject::updateSubject($request, $id);
        return redirect()->route('subjet')->with('success', 'update Successfully');
    }



    // Corse Section
    // ========================

    public function course(){

        return view('back.course.course',[
            'courses' => Course::all(),
        ]);
    }

    public function courseFrom(){
        return view('back.course.courseFrom');
    }

    public function courseSubmit(Request $request){
        
        $request->validate([
            'course' => 'required|string|max:255',
            'status'  => 'required|in:0,1',
        ]);

        Course::saveCourse($request);

        return back()->with('error', 'hoooo');
    }

    public function courseEdit(Request $request){
        return view('back.course.courseEdit',[
            'course' => Course::find($request->id),
        ]);
    }

    public function courseUpdate(Request $request, $id){
        Course::updateCourse($request, $id);
        return redirect()->route('course')->with('success', 'update Successfully');
    }





    // Corse Module Section
    // ========================

    public function module(Request $request){

        $modules = CourseModule::with(['subject', 'course']);

        // Apply filters if they exist
        if ($request->subject_id) {
            $modules->where('subject_id', $request->subject_id);
        }

        if ($request->course_id) {
            $modules->where('course_id', $request->course_id);
        }

        if ($request->status !== null && $request->status !== '') {
            $modules->where('status', $request->status);
        }

        $modules = $modules->paginate(3)->withQueryString();

        $subjects = Subject::where('status', 0)->get();
        $courses  = Course::where('status', 0)->get();

        return view('back.module.module',
            compact('modules', 'subjects','courses')
            
        );
    }

    public function moduleFrom(){
        return view('back.module.moduleFrom',[
            'subjects' => Subject::where('status', 0)->get(),
            'courses'  => Course::where('status', 0)->get(),
        ]);
    }

    public function moduleSubmit(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'course_id' => 'required',
            'course_name' => 'required',
            'image' => 'required|image',

            'modules.*.name' => 'required|string',
            'modules.*.image' => 'nullable|image',
            'modules.*.tag' => 'nullable|string',
            'modules.*.description' => 'nullable|string',
            'modules.*.lessons.*.name' => 'required|string',
            'modules.*.lessons.*.value' => 'required|string',


        ]);

        $courseModule = CourseModule::saveCourseModule($request);
        // CourseModuleExtra::saveCourseModuleExtra($request, $module->id);
        if ($request->has('modules')) {
        CourseModuleSection::saveSections(
            $request->modules,
            $courseModule->id
        );
    }

        return redirect()->back()->with('success', 'Course created successfully');
    }


    public function approve(){

        $approves = CheckOut::where('teacher_created_by_id', Auth::id())
            ->where('status', 0)
            ->get();


        return view('back.details.approve',compact('approves'));
    }

    public function approvedSubmit(Request $request, $id){
        CheckOut::updateApproved($request, $id);
        return back();
    }

    public function rejectSubmit(Request $request, $id){
        CheckOut::updateReject($request, $id);
        return back();
    }





}
