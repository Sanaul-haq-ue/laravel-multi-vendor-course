<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Profile extends Model
{
    use HasFactory;

    private static $profile, $image, $imageNewName, $directory, $imgUrl;

    public static function saveProfile($request){

        self::$profile = new Profile();
        self::$profile->user_id = Auth::id();
        self::$profile->date_of_birth = $request->date_of_birth;
        self::$profile->image = self::saveImage($request);
        self::$profile->certification = $request->certification;
        self::$profile->instituteName = $request->instituteName;
        self::$profile->passingYear = $request->passingYear;
        self::$profile->address = $request->address;
        self::$profile->city = $request->city;
        self::$profile->postalCode = $request->postalCode;
        self::$profile->save();

    }

    public static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageNewName = 'pro'.rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'back/upload/';
        self::$image->move(self::$directory, self::$imageNewName);
        self::$imgUrl = self::$directory . self::$imageNewName;
        return self::$imgUrl;
    }
}
