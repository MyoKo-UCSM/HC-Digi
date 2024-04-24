<?php

namespace Database\Seeders;

use App\Models\Staff;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Str;
use DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('staffs')->truncate();
        
        $staffs= [
            [
                'name'           => 'U Aung Kyaw Soe',
                'position_id'    => '4',
                'contact_number' => '09XXXXXXX',
                'address'        => "South Okkalapa"
            ],
            [
                'name'           => 'U Zaythi Ha Htun',
                'position_id'    => '6',
                'contact_number' => '09XXXXXXX',
                'address'        => "Hlaing"
            ],
            
                       
        ];

        Staff::insert($staffs);
    }
}
