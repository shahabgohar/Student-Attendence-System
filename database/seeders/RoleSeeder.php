<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public $roles = ['admin','user'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i = 0; $i < count($this->roles); $i++){
           DB::table('roles')->insert([
              'role' => $this->roles[$i]
           ]);
       }
    }
}
