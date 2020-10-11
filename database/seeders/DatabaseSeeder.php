<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            StudentClassSeeder::class,
            AssignUserRole::class,
            AttendenceDetailSeeder::class,
            UserProfileSeeder::class,
            AttendenceSeeder::class,
            CreateAdminUser::class,
        ]);

    }
}
