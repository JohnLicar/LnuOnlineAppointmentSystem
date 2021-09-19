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
        $this->call(LaratrustSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(CollegeSeeder::class);
        $this->call(CourseSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
