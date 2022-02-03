<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1 = Role::create(['name' => 'Admin']);
       $role2 = Role::create(['name' => 'Empresa']);
       $role3 = Role::create(['name' => 'Egresado']);

       Permission::create(['name' => 'admin.home'])->assignRole($role1);
       Permission::create(['name' => 'empresa.all'])->assignRole($role1,$role2);
       Permission::create(['name' => 'egresado.all'])->assignRole($role1,$role3);
 
    }
}
