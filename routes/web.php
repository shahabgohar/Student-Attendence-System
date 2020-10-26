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
    Route::get('/attendence-detail',[\App\Http\Controllers\AttendenceDetailController::class,'index']);

});
Route::middleware(['auth','user_role'])->group(function(){
    Route::get('/',\App\Http\Livewire\Student\Menu::class)->name('student-home');
    Route::get('/submit/leave',\App\Http\Livewire\Student\SubmitLeave::class)->middleware(['attendence_present'])->name('submit-leave');
    Route::post('/submit/leave',[\App\Http\Controllers\AttendenceDetailController::class,'store']);
    Route::post('/view/attendence/',[\App\Http\Controllers\AttendenceController::class,'showAttendenceByUser']);
    Route::get('/view/attendence',\App\Http\Livewire\Student\ViewAttendence::class)->name('view-attendence-page');

});

Route::prefix('/admin')->middleware(['auth','check_role'])->group(function() {
    Route::get('/student/report',\App\Http\Livewire\StudentAttendenceReport::class)->name('attendence-report');
    Route::get('/dashboard', \App\Http\Livewire\Dashboard::class)->name('admin-dashboard');
    Route::prefix('/student')->group(function(){
        Route::get('/',\App\Http\Livewire\StudentDetails::class)->name('student-details');
        Route::get('/create',\App\Http\Livewire\CreateStudent::class)->name('create-student');
    });
    Route::prefix('/attendence')->group(function (){
        Route::get('/',\App\Http\Livewire\Attendence::class)->name('student-attendence');
        Route::get('/attendence/create',\App\Http\Livewire\CreateAttendence::class)->name('create-attendence');
        Route::get('/details',\App\Http\Livewire\AttendenceDetails::class)->name('attendence-details');
        Route::get('/list',[\App\Http\Controllers\AttendenceDetailController::class,'index']);
    });
    Route::get('/approve/leave',\App\Http\Livewire\LeaveApproval::class)->name("leave-approve");
    Route::get('/attendences/for/approval',[\App\Http\Controllers\AttendenceController::class,'getLeavesForApproval']);
    Route::get('/attendences/leave/application/{id}',[\App\Http\Controllers\AttendenceController::class,'getApplication']);
    Route::post('/approve/application',[\App\Http\Controllers\AttendenceController::class,'approveApplication']);
    Route::post('/disapprove/application',[\App\Http\Controllers\AttendenceController::class,'disapprovApplication']);
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

