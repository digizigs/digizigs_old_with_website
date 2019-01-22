<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::create(['name' => 'manage_app']);
        Permission::create(['name' => 'manage_user']);
        Permission::create(['name' => 'manage_role']);
        Permission::create(['name' => 'manage_permission']);
        Permission::create(['name' => 'edit_post']);
        Permission::create(['name' => 'write_post']);
        Permission::create(['name' => 'read_post']);
    }
}
