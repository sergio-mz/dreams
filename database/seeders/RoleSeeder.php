<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name'=>'Admin']);

        Permission::create(['name' => 'home'])->assignRole('Admin');

        Permission::create(['name' => 'caracteristicas.index'])->assignRole('Admin');
        Permission::create(['name' => 'caracteristicas.create'])->assignRole('Admin');
        Permission::create(['name' => 'caracteristicas.edit'])->assignRole('Admin');
        Permission::create(['name' => 'caracteristicas.destroy'])->assignRole('Admin');
    }
}
