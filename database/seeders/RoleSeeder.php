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
        Role::create(['name'=>'Admin','status'=>1]);

        Permission::create(['name' => 'home','description' => 'Ver página principal'])->assignRole('Admin');

        Permission::create(['name' => 'roles.index','description' => 'Ver listado de roles'])->assignRole('Admin');
        Permission::create(['name' => 'roles.create','description' => 'Crear rol'])->assignRole('Admin');
        Permission::create(['name' => 'roles.edit','description' => 'Editar rol'])->assignRole('Admin');
        Permission::create(['name' => 'roles.destroy','description' => 'Eliminar rol'])->assignRole('Admin');

        Permission::create(['name' => 'caracteristicas.index','description' => 'Ver listado de características'])->assignRole('Admin');
        Permission::create(['name' => 'caracteristicas.create','description' => 'Crear característica'])->assignRole('Admin');
        Permission::create(['name' => 'caracteristicas.edit','description' => 'Editar característica'])->assignRole('Admin');
        Permission::create(['name' => 'caracteristicas.destroy','description' => 'Eliminar característica'])->assignRole('Admin');
    }
}
