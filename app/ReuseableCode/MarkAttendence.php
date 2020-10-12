<?php
namespace App\ReuseableCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
trait MarkAttendence{
    public function markAttendence($status){
        $userProfile = Auth::user()->user_profile()->first();
        $result = DB::table('attendences')->insert([
            'attendence_date' => $this->provideDate(),
            'status' => $status,
            'student_class_id' => $userProfile->student_class_id,
            'user_profile_id' => $userProfile->id,
            'attendence_detail_id' => $userProfile->attendence_detail_id
        ]);
//          student has submitted his/her present
        $userProfile->update(['attendence_detail_id'=> null]);
        return $result;
    }
}
