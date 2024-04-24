<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (config('database.default') === 'sqlsrv') {
            $this->truncateSQLServer();
        } else {
            DB::table('users')->truncate();
        }

        // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create the admin user
        $admin = User::create([
            'name'              => 'Admin',
            'email'             => 'admin@grg.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('Dev@2024'),
            'remember_token'    => Str::random(10),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        // Attach roles to the user
        $admin->roles()->sync([$adminRole->id]);

        if (config('database.default') === 'sqlsrv') {
            $this->enableForeignKeysSQLServer();
        }
    }


    private function truncateSQLServer()
    {
        DB::statement('EXEC sp_MSforeachtable "ALTER TABLE ? NOCHECK CONSTRAINT ALL";');
        DB::statement('EXEC sp_MSforeachtable "DELETE FROM ?";');
        DB::statement('EXEC sp_MSforeachtable "ALTER TABLE ? WITH CHECK CHECK CONSTRAINT ALL";');
    }

    private function enableForeignKeysSQLServer()
    {
        DB::statement('EXEC sp_MSforeachtable "ALTER TABLE ? WITH CHECK CHECK CONSTRAINT ALL";');
    }
}
