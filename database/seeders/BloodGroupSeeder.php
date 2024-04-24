<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\BloodGroup;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BloodGroup::query()->delete();
        
        $blood_groups = [
            [
                'blood_group_name' => 'A+',
                'description' => 'A+',
                'sort_order' => 1,
                'status' => 1
            ],
            [
                'blood_group_name' => 'A-',
                'description' => 'A-',
                'sort_order' => 2,
                'status' => 1
            ],
            [
                'blood_group_name' => 'B+',
                'description' => 'B+',
                'sort_order' => 3,
                'status' => 1
            ],
            [
                'blood_group_name' => 'B-',
                'description' => 'B-',
                'sort_order' => 4,
                'status' => 1
            ],
            [
                'blood_group_name' => 'O+',
                'description' => 'O+',
                'sort_order' => 5,
                'status' => 1
            ],
            [
                'blood_group_name' => 'O-',
                'description' => 'O-',
                'sort_order' => 6,
                'status' => 1
            ],
            [
                'blood_group_name' => 'AB+',
                'description' => 'AB+',
                'sort_order' => 7,
                'status' => 1
            ],
            [
                'blood_group_name' => 'AB-',
                'description' => 'AB-',
                'sort_order' => 8,
                'status' => 1
            ]
        ];

        //BloodGroup::insert($blood_groups);
        // Insert blood groups data
        foreach ($blood_groups as $bloodGroup) {
            BloodGroup::create($bloodGroup);
        }
        
    }
}
