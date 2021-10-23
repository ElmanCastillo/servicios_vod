<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
		
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
		
		// create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Elman Castillo',
            'email' => 'elmancastt@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Jose Perez',
            'email' => 'jose@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole($role2);

    }
}
