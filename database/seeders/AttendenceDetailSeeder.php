<?php

namespace Database\Seeders;

use App\Models\AttendenceDetail;
use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendenceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car = Carbon::now()->toArray();
        $attendenceDetail = new AttendenceDetail(
            [
                'student_class_id' => 1,
                'attendence_date' => $car['year'].":".$car['month'].":".$car['day'],
                'start_time' => \Carbon\Carbon::now()->toArray()['hour'].':'.\Carbon\Carbon::now()->toArray()['minute'],
                'end_time' => (\Carbon\Carbon::now()->toArray()['hour']+1).':'.\Carbon\Carbon::now()->toArray()['minute'],
                'expired' => false
            ]
        );

        $result = $attendenceDetail->save();
        UserProfile::
        where('student_class_id','=',$attendenceDetail->student_class_id)
            ->update(['attendence_detail_id'=>$attendenceDetail->id]);

    }
}
