<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    private static $subject;
    
    use HasFactory;

    public static function saveSubject($request)
    {
        
        self::$subject = New Subject();
        self::$subject->subject = $request->subject;
        self::$subject->status = $request->status;
        self::$subject->save();
    }


    public static function updateSubject($request, $id)
    {
        
        self::$subject = Subject::find($id);
        self::$subject->subject = $request->subject;
        self::$subject->status = $request->status;
        self::$subject->save();
    }
}
