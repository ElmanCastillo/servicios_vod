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
		
		Permission::create(['name' => 'permission-list'])->assignRole($role1);	
		Permission::create(['name' => 'permission-create'])->assignRole($role1);	
		Permission::create(['name' => 'permission-edit'])->assignRole($role1);
		Permission::create(['name' => 'permission-delete'])->assignRole($role1);
		
        Permission::create(['name' => 'role-list'])->assignRole($role1);	
		Permission::create(['name' => 'role-create'])->assignRole($role1);	
		Permission::create(['name' => 'role-edit'])->assignRole($role1);
		Permission::create(['name' => 'role-delete'])->assignRole($role1);	
		
        Permission::create(['name' => 'user-list'])->assignRole($role1);	
		Permission::create(['name' => 'user-create'])->assignRole($role1);	
		Permission::create(['name' => 'user-edit'])->assignRole($role1);
		Permission::create(['name' => 'user-delete'])->assignRole($role1);		
    }
}
