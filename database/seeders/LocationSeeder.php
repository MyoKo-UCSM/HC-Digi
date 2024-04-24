<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('EXEC sp_MSforeachtable "ALTER TABLE ? NOCHECK CONSTRAINT all"');

        // Truncate the locations table
        Location::truncate();

        // Enable foreign key checks
        DB::statement('EXEC sp_MSforeachtable "ALTER TABLE ? WITH CHECK CHECK CONSTRAINT all"');
        
        $locations = [
            [
                'location_name' => 'Head Office',
                'location_code' => 'L001',
                'description' => 'Head Office',
                'status' => 1
            ],
            [
                'location_name' => 'Mandalay Office',
                'location_code' => 'L002',
                'description' => 'Mandalay Office',
                'status' => 1
            ],
            [
                'location_name' => 'Lashio Office',
                'location_code' => 'L003',
                'description' => 'Lashio Office',
                'status' => 1
            ],
        ];

        // Insert locations data
        Location::insert($locations);
    }
}
