<?php

namespace Database\Seeders;

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
        DB::table('attendence_details')->insert([
           'student_class_id' => 1,
           'attendence_date' => '2020-10-10',
           'start_time' => \Carbon\Carbon::now()->toArray()['hour'].':'.\Carbon\Carbon::now()->toArray()['minute'],
           'end_time' => (\Carbon\Carbon::now()->toArray()['hour']+1).':'.\Carbon\Carbon::now()->toArray()['minute'],
            'expired' => false
        ]);
    }
}
