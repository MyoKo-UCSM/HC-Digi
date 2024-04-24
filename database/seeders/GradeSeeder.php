<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        Grade::query()->delete();
        
        $grades = [
            [
                'grade_name'   => 'Grade 8',
                'grade_code'   => 'G008',
                'description'  => 'Grade 8',
                'sort_order'   => 1,
                'status'       => 1
            ],
            [
                'grade_name'   => 'Grade 7',
                'grade_code'   => 'G007',
                'description'  => 'Grade 7',
                'sort_order'   => 2,
                'status'       => 1
            ],
            [
                'grade_name'   => 'Grade 6',
                'grade_code'   => 'G006',
                'description'  => 'Grade 6',
                'sort_order'   => 3,
                'status'       => 1
            ],
            [
                'grade_name'   => 'Grade 5',
                'grade_code'   => 'G005',
                'description'  => 'Grade 5',
                'sort_order'   => 4,
                'status'       => 1
            ],
            [
                'grade_name'   => 'Grade 4',
                'grade_code'   =>  'G004',
                'description'  => 'Grade 4',
                'sort_order'   => 5,
                'status'       => 1
            ]           
            
        ];

        Grade::insert($grades);
        
    }
}
