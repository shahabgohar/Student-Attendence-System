<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'shahab',
            'last_name' => 'gohar',
            'mid_name' => 'ud din',
            'email' => 'tester@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()
        ]);
        DB::table('role_user')->insert([
           'user_id' => DB::table('users')->count('id'),
            'role_id' => 1
        ]);
    }
}
