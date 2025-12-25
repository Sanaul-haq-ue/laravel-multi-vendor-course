<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    private static $course;

    use HasFactory;

    public static function saveCourse($request)
    {
        
        self::$course = New Course();
        self::$course->course = $request->course;
        self::$course->status = $request->status;
        self::$course->created_by   = Auth::id();
        self::$course->save();
    }


    public static function updateCourse($request, $id)
    {
        
        self::$course = Course::find($id);
        self::$course->course = $request->course;
        self::$course->status = $request->status;
        self::$course->updated_by   = Auth::id();
        self::$course->save();
    }
}
