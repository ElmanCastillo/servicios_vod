<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
		$role2 = Role::create(['name' => 'suscriptor']);
         
	    Permission::create(['name' => 'post-list'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'post-create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'post-edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'post-delete'])->assignRole($role1);	
    }
}
