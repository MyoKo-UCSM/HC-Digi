<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(NrcSeeder::class);           
        $this->call(LocationSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(SubDepartmentSeeder::class);        
        $this->call(BloodGroupSeeder::class);
        $this->call(GradeSeeder::class);     
        $this->call(PositionSeeder::class);
    }
}
