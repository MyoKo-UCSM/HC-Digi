<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\SubDepartment;
use Illuminate\Support\Str;

class SubDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('EXEC sp_MSforeachtable "ALTER TABLE ? NOCHECK CONSTRAINT all"');
        
        // Delete records from the departments table
        SubDepartment::query()->delete();

        // Enable foreign key checks
        DB::statement('EXEC sp_MSforeachtable "ALTER TABLE ? WITH CHECK CHECK CONSTRAINT all"');
        
        // Fetch all department IDs
        $departmentIds = Department::pluck('id')->toArray();
        // Define departments data
        $sub_departments = [
            [
                'sub_department_name' => 'Cyber Security',
                'sort_order' => 1,
                'description' => 'Cyber Security',
                'status' => 1,

            ],
            [
                'sub_department_name' => 'Software Developent',
                'sort_order' => 2,
                'description' => 'Software Developent',
                'status' => 1,

            ],
            [
                'sub_department_name' => 'ERP Management',
                'sort_order' => 3,
                'description' => 'ERP Management',
                'status' => 1,

            ],
           
        ];

        // Insert sub departments data
        foreach ($sub_departments as $subDepartment) {
            // Assign a random department ID
            $subDepartment['department_id'] = $departmentIds[array_rand($departmentIds)];
            $subDepartment['id'] = Str::uuid(); // Generate a unique UUID for each record
            SubDepartment::create($subDepartment);
        }
        //SubDepartment::insert($sub_departments);
    }
}
