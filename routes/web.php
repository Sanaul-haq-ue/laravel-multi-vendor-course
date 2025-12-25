<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\CheckOutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'redirectByRole'])->name('dashboard');
Route::get('/trainers',[HomeController::class,'trainers'])->name('trainers');
Route::get('/courses',[HomeController::class,'courses'])->name('courses');
Route::get('/single-page/{id}',[HomeController::class,'singlePage'])->name('singlePage');

Route::get('/login',[AuthController::class,'loginFrom'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login_submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/signUp',[AuthController::class,'registerFrom'])->name('register');
Route::post('/signUp',[AuthController::class,'registerSubmit'])->name('registerSubmit');




Route::middleware(['admin'])->prefix('admin')->group(function()
{
    Route::get('/dashboard',[AdminController::class,'index_admin'])->name('admin.dashboard');
});

Route::middleware(['student'])->prefix('student')->group(function()
{
    Route::get('/dashboard',[AdminController::class,'index_student'])->name('student.dashboard');        

    Route::get('/Check-Out/{id}',[CheckOutController::class,'index'])->name('checkOut');        
    Route::post('/checkoutSubmit/{id}',[CheckOutController::class,'checkoutSubmit'])->name('checkoutSubmit');        

});


Route::middleware(['teacher'])->prefix('teacher')->group(function()
{
    Route::get('/dashboard',[AdminController::class,'index_teacher'])->name('teacher.dashboard');        

    Route::get('/subject',[CourseController::class,'subject'])->name('subjet');
    Route::get('/subjectFrom',[CourseController::class,'subjectFrom'])->name('subjectFrom');
    Route::post('/subjectSubmit',[CourseController::class,'subjectSubmit'])->name('subjectSubmit');
    Route::post('/subjectEdit',[CourseController::class,'subjectEdit'])->name('subjectEdit');
    Route::put('/subjectUpdate/{id}',[CourseController::class,'subjectUpdate'])->name('subjectUpdate');

    Route::get('/course',[CourseController::class,'course'])->name('course');
    Route::get('/courseFrom',[CourseController::class,'courseFrom'])->name('courseFrom');
    Route::post('/courseSubmit',[CourseController::class,'courseSubmit'])->name('courseSubmit');
    Route::post('/courseEdit',[CourseController::class,'courseEdit'])->name('courseEdit');
    Route::put('/courseUpdate/{id}',[CourseController::class,'courseUpdate'])->name('courseUpdate');

    Route::get('/module',[CourseController::class,'module'])->name('module');
    Route::get('/moduleFrom',[CourseController::class,'moduleFrom'])->name('moduleFrom');
    Route::post('/moduleSubmit',[CourseController::class,'moduleSubmit'])->name('moduleSubmit');
    Route::post('/moduleEdit',[CourseController::class,'moduleEdit'])->name('moduleEdit');
    Route::put('/moduleUpdate/{id}',[CourseController::class,'moduleUpdate'])->name('moduleUpdate');

    Route::get('/approve',[CourseController::class,'approve'])->name('approve');
    Route::put('/approvedSubmit/{id}',[CourseController::class,'approvedSubmit'])->name('approvedSubmit');
    Route::put('/rejectSubmit/{id}',[CourseController::class,'rejectSubmit'])->name('rejectSubmit');


    
});