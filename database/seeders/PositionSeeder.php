<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Grade;
use App\Models\Position;
use Illuminate\Support\Str;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('EXEC sp_MSforeachtable "ALTER TABLE ? NOCHECK CONSTRAINT all"');
        
        // Delete records from the departments table
        Position::query()->delete();

        // Enable foreign key checks
        DB::statement('EXEC sp_MSforeachtable "ALTER TABLE ? WITH CHECK CHECK CONSTRAINT all"');
        
        // Fetch all Graee IDs
        $gradeIds = Grade::pluck('id')->toArray();
        // Define departments data
        $positions = [
            [
                'position_title' => 'Head of Department',
                'sort_order' => 1,
                'description' => 'Head of Department',
                'status' => 1,

            ],
            [
                'position_title' => 'Manager',
                'sort_order' => 2,
                'description' => 'Manager',
                'status' => 1,

            ],
            [
                'position_title' => 'Assistant Manager',
                'sort_order' => 3,
                'description' => 'Assistant Manager',
                'status' => 1,

            ],
           
        ];

        // Insert sub departments data
        foreach ($positions as $position) {
            // Assign a random department ID
            $position['grade_id'] = $gradeIds[array_rand($gradeIds)];
            $position['id'] = Str::uuid(); // Generate a unique UUID for each record
            Position::create($position);
        }
        //Position::insert($positions);
    }
}
