<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CheckOut extends Model
{
    use HasFactory;

    private static $checkout;

    public static function saveCheckOut($request, $id){
        self::$checkout = new CheckOut();
        self::$checkout->user_id = Auth::id();
        self::$checkout->courseModule_id = $id;
        self::$checkout->price = $request->price;
        self::$checkout->payment = $request->payment;
        self::$checkout->status = 0;
        self::$checkout->teacher_created_by_id = $request->teacher_created_by_id;
        self::$checkout->save();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function courseModule(){
        return $this->belongsTo(CourseModule::class,'courseModule_id');
    }



    public static function updateApproved($request, $id){
        self::$checkout = CheckOut::find($id);
        self::$checkout->status = $request->status;
        self::$checkout->save();
    }

    public static function updateReject($request, $id){
        self::$checkout = CheckOut::find($id);
        self::$checkout->status = $request->status;
        self::$checkout->save();
    }


    
}
