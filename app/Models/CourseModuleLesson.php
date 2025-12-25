<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModuleLesson extends Model
{
    use HasFactory;

    private static $lesson;

    public static function saveLessons($lessons, $sectionId)
    {
        foreach ($lessons as $lesson) {

            if (empty($lesson['name']) || empty($lesson['value'])) {
                continue;
            }

            self::$lesson = new self();
            self::$lesson->course_module_section_id = $sectionId;
            self::$lesson->name = $lesson['name'];
            self::$lesson->value = $lesson['value'];
            self::$lesson->save();
        }
    }

    public function section()
    {
        return $this->belongsTo(CourseModuleSection::class, 'course_module_section_id');
    }
}
