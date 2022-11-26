<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // create permissions
        $permissions = [
            'role list',
            'role create',
            'role edit',
            'role delete',
            'user list',
            'user create',
            'user edit',
            'user delete'
         ];

        foreach ($permissions as $permission) {
           
            Permission:: create(['name' => $permission]);
        }
        // create roles and assign existing permissions
      
        $role1 = Role::create(['name' => 'user']);
      
        $role1->givePermissionTo('role list');
        
        $role2 = Role::create(['name' => 'admin']);
      
        foreach ($permissions as $permission) {
            $role2->givePermissionTo($permission);
        }
         
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'alok@gmail.com',
         ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'test@example.com',
       
        ]);

        $user->assignRole($role1);
    }
}
