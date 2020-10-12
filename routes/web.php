<?php

use App\Models\UserProfile;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['guest'])->group(function (){

    Route::get('/login',\App\Http\Livewire\Student\Login::class);
    Route::get('/register',\App\Http\Livewire\Student\Signup::class);
    Route::get('/admin',\App\Http\Livewire\AdminLogin::class)->name('admin-login');

});
Route::middleware(['auth','user_role'])->group(function(){
    Route::get('/',\App\Http\Livewire\Student\Menu::class)->name('student-home');
    Route::get('/submit/leave',\App\Http\Livewire\Student\SubmitLeave::class)->name('submit-leave');
    Route::post('/submit/leave',[\App\Http\Controllers\AttendenceDetailController::class,'store']);

});

Route::prefix('/admin')->middleware(['auth','check_role'])->group(function() {
    Route::get('attendence/approval',\App\Http\Livewire\LeaveApprovalModule::class);
    Route::get('/student/report',\App\Http\Livewire\StudentAttendenceReport::class)->name('attendence-report');
    Route::get('/dashboard', \App\Http\Livewire\Dashboard::class)->name('admin-dashboard');
    Route::prefix('/student')->group(function(){
        Route::get('/',\App\Http\Livewire\StudentDetails::class)->name('student-details');
        Route::get('/create',\App\Http\Livewire\CreateStudent::class)->name('create-student');
    });
    Route::prefix('/attendence')->group(function (){
        Route::get('/',\App\Http\Livewire\Attendence::class)->name('student-attendence');
        Route::get('/attendence/create',\App\Http\Livewire\CreateAttendence::class)->name('create-attendence');

    });
 });
Route::middleware(['auth'])->group(function(){
    Route::get('/student-details',function(){
        return response()->json(\App\Models\User::all());
    });
    Route::get('/student/attendence/list',[\App\Http\Controllers\AttendenceController::class,'index']);
    Route::any('/student/attendence/list/update/{attendence:user_id}',[\App\Http\Controllers\AttendenceController::class,'update']);
    Route::delete('/student/attendence/list/delete/{attendence:user_id}',[\App\Http\Controllers\AttendenceController::class,'destroy']);
    Route::any('/student/report',[\App\Http\Controllers\UserProfileController::class,'search_user_for_report'])->name('get-report');

});

