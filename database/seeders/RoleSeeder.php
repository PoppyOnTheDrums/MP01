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
       $role2 = Role::create(['name' => 'Usuario']);

       Permission::create(['name' => 'admin.home'])->assignRole($role1);
       Permission::create(['name' => 'admin.productos'])->assignRole($role1);
       Permission::create(['name' => 'admin.user'])->assignRole($role1);
       Permission::create(['name' => 'admin.create'])->assignRole($role1);
       Permission::create(['name' => 'admin.productostore'])->assignRole($role1);
       Permission::create(['name' => 'admin.productoedit'])->assignRole($role1);
       Permission::create(['name' => 'admin.productoupdate'])->assignRole($role1);
       Permission::create(['name' => 'admin.productodelete'])->assignRole($role1);
    }
}
