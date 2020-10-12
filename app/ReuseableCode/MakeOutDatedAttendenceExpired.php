<?php
namespace App\ReuseableCode;
use App\Models\AttendenceDetail;

trait MakeOutDatedAttendenceExpired{
    public function doMakeOutDatedAttendenceExpired(){
//        get current date and tome
            $current_time  = \Carbon\Carbon::now()->toArray();
            $time = $current_time['hour'].":".$current_time['minute'];
            $date = $current_time['year'].":".$current_time['month'].":".$current_time['day'];
//      updating for the skipped days
      $temp = AttendenceDetail::
          where('attendence_date','<',$date)
          ->where('expired','=',false)
          ->update(['expired'=>true]);
//            compare and update
        $result = \App\Models\AttendenceDetail::
            where('attendence_date','=',$date)
            ->where('end_time','<',$time)
            ->where('expired','=',0)
             ->update(['expired'=>true]);


    }
}
