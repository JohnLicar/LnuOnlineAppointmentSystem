<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Seeder;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colleges = [

            'College of Education',
            'College of Arts and Science',
            'College of Management and Entrepreneurship'
        ];
        foreach ($colleges as $college) {
            College::create(['description' => $college]);
        }
    }
}
