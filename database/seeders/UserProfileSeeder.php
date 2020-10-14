<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;


class UserProfileSeeder extends Seeder
{
    public $rollNumberAssign = [];

    public function init_roll_numer_assign(){
        for ($i =1;$i<=12;$i++){
            $this->rollNumberAssign[$i]=1;
        }

    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        get all the ids for students
        $this->init_roll_numer_assign();
        $stuent_ids = DB::table('users')->select('id')->get();
        echo 'student record : '.count($stuent_ids);
        $class_ids = DB::table('student_classes')->select('id')->get();
        for($i = 0,$j = 0; $i < count($stuent_ids); $i ++){
            if(count($class_ids) === $j){
                $j = 0;
                $i--;
            }else{
                DB::table('user_profiles')->insert([
                    'user_id' => $stuent_ids[$i]->id,
                    'student_class_id' => $class_ids[$j]->id,
                    'father_name' => \Illuminate\Support\Str::random(10),
                    'roll_number' => $this->rollNumberAssign[$j+1],
                    'profile_photo' => Str::random(10),
                    'attendence_detail_id' => 1
                ]);
                ++$j;
            }
        }
    }
}
