<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModuleSection extends Model
{
    use HasFactory;

    private static $section, $image, $imageNewName, $directory, $imgUrl;

    public static function saveSections($modules, $courseModuleId)
    {
        foreach ($modules as $module) {

            self::$section = new self();
            self::$section->course_module_id = $courseModuleId;
            self::$section->name = $module['name'];
            self::$section->tag = $module['tag'];
            self::$section->description = $module['description'];

            if (!empty($module['image'])) {
                self::$section->image = self::saveImage($module['image']);
            }

            self::$section->save();

            // Save lessons
            if (!empty($module['lessons'])) {
                CourseModuleLesson::saveLessons(
                    $module['lessons'],
                    self::$section->id
                );
            }
        }
    }


    public static function saveImage($image){
        self::$image = $image;
        self::$imageNewName='cmi'.rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory='back/upload/';
        self::$image->move(self::$directory,self::$imageNewName);
        self::$imgUrl=self::$directory.self::$imageNewName;
        return self::$imgUrl;
    }

    public function lessons()
    {
        return $this->hasMany(CourseModuleLesson::class, 'course_module_section_id');
    }

    public function module()
    {
        return $this->belongsTo(CourseModule::class, 'course_module_id');
    }
}
