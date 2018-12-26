<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create(['name' => 'superadmin']);
        $super_admin->givePermissionTo('users_manage');
        $super_admin->givePermissionTo('app_manage');
        $super_admin->givePermissionTo('write_post');
        $super_admin->givePermissionTo('edit_post');





          
    }
}
