<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendenceSeeder extends Seeder
{
    public $status = ['present', 'absent', 'path to leave'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        get student ids

        $student_ids = DB::table('user_profiles')->select('id','student_class_id')->get();

        for($i = 0,$j = 0; $i < count($student_ids);$i++){

            if($j === count($this->status)){ //0 1 2
              $j = 0;
              $i--;
            }else{

                for($k=0;$k<20;$k++) {
                    if($j === count($this->status)){ //0 1 2
                        $j = 0;
                        $k--;
                    }else{
                        //Generate a timestamp using mt_rand.
                        $timestamp = mt_rand(1, time());
                        //Format that timestamp into a readable date string.
                        $randomDate = date("y-m-d", $timestamp);
                        DB::table('attendences')->insert([
                            'user_profile_id' => $student_ids[$i]->id,
                            'attendence_date' => $randomDate,
                            'student_class_id' => $student_ids[$i]->student_class_id,
                            'status' => $this->status[$j],
                            'attendence_detail_id' => (int)$student_ids[$i]->student_class_id === 1 ? 1 : null
                        ]);
                        $j++;
                    }

                }

            }

        }

    }
}
