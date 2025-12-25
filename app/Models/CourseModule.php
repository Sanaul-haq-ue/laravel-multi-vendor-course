<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CourseModule extends Model
{
    use HasFactory;

    private static $module, $image, $imageNewName, $directory, $imgUrl;

    public static function saveCourseModule($request)
    {

        self::$module = new CourseModule();
        self::$module->subject_id  = $request->subject_id;
        self::$module->course_id   = $request->course_id;
        self::$module->course_name = $request->course_name;
        self::$module->description = $request->description;
        self::$module->image       = self::saveImage($request);
        self::$module->status      = $request->status;

        self::$module->regular_price = $request->regular_price;
        self::$module->main_price = $request->main_price;
        self::$module->seats = $request->seats;
        self::$module->schedule = $request->schedule;
        self::$module->timing = $request->timing;

        self::$module->created_by   = Auth::id();
        self::$module->save();

        return self::$module;
    }

    public static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageNewName='cmi'.rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory='back/upload/';
        self::$image->move(self::$directory,self::$imageNewName);
        self::$imgUrl=self::$directory.self::$imageNewName;
        return self::$imgUrl;
    }

    public function sections()
    {
        return $this->hasMany(CourseModuleSection::class, 'course_module_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
