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
        Role::create(['name'=>'Asistente','status'=>1]);

        Permission::create(['name' => 'home','description' => 'Ver página principal'])->assignRole('Admin');

        Permission::create(['name' => 'roles.index','description' => 'Ver listado de roles'])->assignRole('Admin');
        Permission::create(['name' => 'roles.create','description' => 'Crear rol'])->assignRole('Admin');
        Permission::create(['name' => 'roles.edit','description' => 'Editar rol'])->assignRole('Admin');
        Permission::create(['name' => 'roles.destroy','description' => 'Eliminar rol'])->assignRole('Admin');

        Permission::create(['name' => 'caracteristicas.index','description' => 'Ver listado de características'])->assignRole('Admin');
        Permission::create(['name' => 'caracteristicas.create','description' => 'Crear característica'])->assignRole('Admin');
        Permission::create(['name' => 'caracteristicas.edit','description' => 'Editar característica'])->assignRole('Admin');
        Permission::create(['name' => 'caracteristicas.destroy','description' => 'Eliminar característica'])->assignRole('Admin');

        Permission::create(['name' => 'domos.index','description' => 'Ver listado de domos'])->syncRoles('Admin','Asistente');
        Permission::create(['name' => 'domos.create','description' => 'Crear domo'])->syncRoles('Admin','Asistente');
        Permission::create(['name' => 'domos.edit','description' => 'Editar domo'])->syncRoles('Admin','Asistente');
        Permission::create(['name' => 'domos.destroy','description' => 'Eliminar domo'])->syncRoles('Admin','Asistente');

        Permission::create(['name' => 'clientes.index','description' => 'Ver listado de clientes'])->assignRole('Admin');
        Permission::create(['name' => 'clientes.create','description' => 'Crear cliente'])->assignRole('Admin');
        Permission::create(['name' => 'clientes.edit','description' => 'Editar cliente'])->assignRole('Admin');
        Permission::create(['name' => 'clientes.destroy','description' => 'Eliminar cliente'])->assignRole('Admin');

        Permission::create(['name' => 'servicios.index','description' => 'Ver listado de servicios'])->assignRole('Admin');
        Permission::create(['name' => 'servicios.create','description' => 'Crear servicio'])->assignRole('Admin');
        Permission::create(['name' => 'servicios.edit','description' => 'Editar servicio'])->assignRole('Admin');
        Permission::create(['name' => 'servicios.destroy','description' => 'Eliminar servicio'])->assignRole('Admin');

        Permission::create(['name' => 'metodos.index','description' => 'Ver listado de metodos'])->assignRole('Admin');
        Permission::create(['name' => 'metodos.create','description' => 'Crear metodo'])->assignRole('Admin');
        Permission::create(['name' => 'metodos.edit','description' => 'Editar metodo'])->assignRole('Admin');
        Permission::create(['name' => 'metodos.destroy','description' => 'Eliminar metodo'])->assignRole('Admin');

        Permission::create(['name' => 'planes.index','description' => 'Ver listado de planes'])->assignRole('Admin');
        Permission::create(['name' => 'planes.create','description' => 'Crear plan'])->assignRole('Admin');
        Permission::create(['name' => 'planes.edit','description' => 'Editar plan'])->assignRole('Admin');
        Permission::create(['name' => 'planes.destroy','description' => 'Eliminar plan'])->assignRole('Admin');

        Permission::create(['name' => 'reservas.index','description' => 'Ver listado de reservas'])->syncRoles('Admin','Asistente');
        Permission::create(['name' => 'reservas.create','description' => 'Crear reserva'])->syncRoles('Admin','Asistente');
        Permission::create(['name' => 'reservas.edit','description' => 'Editar reserva'])->syncRoles('Admin','Asistente');
        Permission::create(['name' => 'reservas.destroy','description' => 'Eliminar reserva'])->syncRoles('Admin','Asistente');

        Permission::create(['name' => 'recomendaciones.index','description' => 'Ver listado de recomendaciones'])->assignRole('Admin');
        Permission::create(['name' => 'recomendaciones.create','description' => 'Crear recomendación'])->assignRole('Admin');
        Permission::create(['name' => 'recomendaciones.edit','description' => 'Editar recomendación'])->assignRole('Admin');
        Permission::create(['name' => 'recomendaciones.destroy','description' => 'Eliminar recomendación'])->assignRole('Admin');

        Permission::create(['name' => 'usuarios.index','description' => 'Ver listado de usuarios'])->assignRole('Admin');
        Permission::create(['name' => 'usuarios.create','description' => 'Crear usuario'])->assignRole('Admin');
        Permission::create(['name' => 'usuarios.edit','description' => 'Editar usuario'])->assignRole('Admin');
        Permission::create(['name' => 'usuarios.destroy','description' => 'Eliminar usuario'])->assignRole('Admin');
    }
}
