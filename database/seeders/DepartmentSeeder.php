<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('EXEC sp_MSforeachtable "ALTER TABLE ? NOCHECK CONSTRAINT all"');
        
        // Delete records from the departments table
        Department::query()->delete();

        // Enable foreign key checks
        DB::statement('EXEC sp_MSforeachtable "ALTER TABLE ? WITH CHECK CHECK CONSTRAINT all"');
        
        // Define departments data
        $departments = [
            [
                'department_name' => 'HR',
                'department_code' => 'D001',
                'description' => 'HR',
                'status' => 1
            ],
            [
                'department_name' => 'Finance',
                'department_code' => 'D002',
                'description' => 'Finance',
                'status' => 1
            ],
            [
                'department_name' => 'IDT',
                'department_code' => 'D003',
                'description' => 'IDT',
                'status' => 1
            ],
        ];

        // Insert departments data
        Department::insert($departments);
    }
}
