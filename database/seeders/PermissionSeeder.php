<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table('permissions')->truncate();
        if (config('database.default') === 'sqlsrv') {
            $this->truncateSQLServer();
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('permissions')->truncate();
        }

        //app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // $datas = collect([
        //     ['id' => 1, 'parent_id' => 0, 'name' => 'dashboard', 'title' => 'Dashboard', 'guard_name' => 'web'],
        //     ['id' => 2, 'parent_id' => 1, 'name' => 'dashboard.listing', 'title' => 'Dashboard', 'guard_name' => 'web'],
        // ]);

        // $permissions = collect($datas)->map(function ($permission) {
        //     return ['parent_id' => $permission['parent_id'], 'name' => $permission['name'], 'title' => $permission['title'], 'guard_name' => 'web'];
        // });
        // Permission::insert($permissions->toArray());


        $permissions = [
            ['parent_id' => 0, 'name' => 'dashboard', 'title' => 'Dashboard', 'guard_name' => 'web'],
            ['parent_id' => 1, 'name' => 'dashboard.listing', 'title' => 'Dashboard', 'guard_name' => 'web'],
        ];

        Permission::insert($permissions);
        
        if (config('database.default') === 'sqlsrv') {
            $this->enableForeignKeysSQLServer();
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }



        // $permission = [];

        // foreach ($datas as $data) {
        //     $permission[] = [
        //         'id'         => $data['id'],
        //         'parent_id'  => $data['parent_id'],
        //         'name'       => $data['name'],
        //         'title'      => $data['title'],
        //         'guard_name' => $data['guard_name'],
        //     ];
        // }
        // // app()['cache']->forget('spatie.permission.cache');

        // DB::table('permissions')->insert($permission);

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
