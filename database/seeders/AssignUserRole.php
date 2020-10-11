<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignUserRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        retreive all User IDs from the Db
        $user_ids = DB::table('users')->select('id')->get();
        $user_id_count = count($user_ids);
        for($i =0 ; $i <$user_id_count;$i++){
            DB::table('role_user')->insert([
               'user_id' => (int)$user_ids[$i]->id,
                'role_id' => 2
            ]);
        }
    }
}
