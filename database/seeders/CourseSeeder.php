<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'description' => 'ABCOM',
                'college_id' => '2'
            ],
            [
                'description' => 'AB POL SCI',
                'college_id' => '2'
            ],
            [
                'description' => 'AB ENGLISH',
                'college_id' => '2'
            ],
            [
                'description' => 'BEED',
                'college_id' => '1'
            ],

            [
                'description' => 'BSED',
                'college_id' => '1'

            ],
            [
                'description' => 'BSHAE',
                'college_id' => '3'

            ],
            [
                'description' =>   'BSHRM',
                'college_id' => '3'

            ],
            [
                'description' =>  'BSSW',
                'college_id' => '2'

            ],
            [
                'description' =>   'BSTHRM',
                'college_id' => '3'

            ],

            [
                'description' =>   'BSIT',
                'college_id' => '2'

            ],


        ];
        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
