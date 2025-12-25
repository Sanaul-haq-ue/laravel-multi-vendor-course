<?php

namespace App\Http\Controllers;

use App\Models\CheckOut;
use App\Models\CourseModule;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class CheckOutController extends Controller
{
    public function index($id){
        $course=CourseModule::findOrFail($id);

        return view('back.details.checkout',compact('course'));
    }

    public function checkoutSubmit(Request $request, $id){

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $userId = Auth::id();

        $profileExists = Profile::where('user_id', $userId)->exists();

        if(!$profileExists){
            Profile::saveProfile($request);
        }

        CheckOut::saveCheckOut($request, $id);

        return redirect()->route('student.dashboard')->with('success', 'Course purchesh Successfully');
    }
}
