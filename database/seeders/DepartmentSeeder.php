<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'description' => 'MIS',
                'hasVicePresident' => true,
                'hasChairman' => false
            ],
            [
                'description' => 'Accounting',
                'hasVicePresident' => false,
                'hasChairman' => false
            ],
            [
                'description' => 'Registrar',
                'hasVicePresident' => false,
                'hasChairman' => false
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
