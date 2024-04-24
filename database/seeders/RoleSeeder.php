<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        if (config('database.default') === 'sqlsrv') {
            $this->truncateSQLServer();
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('roles')->truncate();
            DB::table('model_has_roles')->truncate();
        }

        // Create 'admin' role
        $adminRole = Role::create([
            'name'       => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Create 'user' role
        $userRole = Role::create([
            'name'       => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Assign permissions to the 'admin' role
        $adminRole->givePermissionTo(Permission::all());

        if (config('database.default') === 'sqlsrv') {
            $this->enableForeignKeysSQLServer();
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
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
