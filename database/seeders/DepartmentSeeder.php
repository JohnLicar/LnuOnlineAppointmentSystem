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
                // 'code' => 'MIS',
                'vp_id' => 2,
                'chairman_id' => 3
            ],
            [
                'description' => 'Accounting',
                // 'code' => 'ACCT',
            ],
            [
                'description' => 'Registrar',
                // 'code' => 'REG',
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
