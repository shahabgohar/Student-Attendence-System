<?php
namespace App\ReuseableCode;
trait MakeOutDatedAttendenceExpired{
    public function doMakeOutDatedAttendenceExpired(){
//        get current date and tome
            $current_time  = \Carbon\Carbon::now()->toArray();
            $time = $current_time['hour'].":".$current_time['minute'];
            $date = $current_time['year'].":".$current_time['month'].":".$current_time['day'];
//            compare and update
        $result = \App\Models\AttendenceDetail::
            where('end_time','>',$time)
            ->where('expired','=',false)
            ->where('attendence_date','=',$date)
             ->update(['expired'=>true]);
//add to the
        ;
    }
}
