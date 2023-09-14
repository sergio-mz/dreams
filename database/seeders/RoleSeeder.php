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
        Role::create(['name'=>'Administrador','status'=>1]);
        Role::create(['name'=>'Asistente','status'=>1]);

        Permission::create(['name' => 'home','description' => 'Ver página principal'])->assignRole('Administrador');

        Permission::create(['name' => 'roles.index','description' => 'Ver listado de roles'])->assignRole('Administrador');
        Permission::create(['name' => 'roles.create','description' => 'Crear rol'])->assignRole('Administrador');
        Permission::create(['name' => 'roles.edit','description' => 'Editar rol'])->assignRole('Administrador');
        Permission::create(['name' => 'roles.destroy','description' => 'Eliminar rol'])->assignRole('Administrador');

        Permission::create(['name' => 'caracteristicas.index','description' => 'Ver listado de características'])->assignRole('Administrador');
        Permission::create(['name' => 'caracteristicas.create','description' => 'Crear característica'])->assignRole('Administrador');
        Permission::create(['name' => 'caracteristicas.edit','description' => 'Editar característica'])->assignRole('Administrador');
        Permission::create(['name' => 'caracteristicas.destroy','description' => 'Eliminar característica'])->assignRole('Administrador');

        Permission::create(['name' => 'domos.index','description' => 'Ver listado de domos'])->assignRole('Administrador');
        Permission::create(['name' => 'domos.create','description' => 'Crear domo'])->assignRole('Administrador');
        Permission::create(['name' => 'domos.edit','description' => 'Editar domo'])->assignRole('Administrador');
        Permission::create(['name' => 'domos.destroy','description' => 'Eliminar domo'])->assignRole('Administrador');

        Permission::create(['name' => 'clientes.index','description' => 'Ver listado de clientes'])->syncRoles('Administrador','Asistente');
        Permission::create(['name' => 'clientes.create','description' => 'Crear cliente'])->syncRoles('Administrador','Asistente');
        Permission::create(['name' => 'clientes.edit','description' => 'Editar cliente'])->syncRoles('Administrador','Asistente');
        Permission::create(['name' => 'clientes.destroy','description' => 'Eliminar cliente'])->assignRole('Administrador');

        Permission::create(['name' => 'servicios.index','description' => 'Ver listado de servicios'])->assignRole('Administrador');
        Permission::create(['name' => 'servicios.create','description' => 'Crear servicio'])->assignRole('Administrador');
        Permission::create(['name' => 'servicios.edit','description' => 'Editar servicio'])->assignRole('Administrador');
        Permission::create(['name' => 'servicios.destroy','description' => 'Eliminar servicio'])->assignRole('Administrador');

        Permission::create(['name' => 'metodos.index','description' => 'Ver listado de metodos'])->assignRole('Administrador');
        Permission::create(['name' => 'metodos.create','description' => 'Crear metodo'])->assignRole('Administrador');
        Permission::create(['name' => 'metodos.edit','description' => 'Editar metodo'])->assignRole('Administrador');
        Permission::create(['name' => 'metodos.destroy','description' => 'Eliminar metodo'])->assignRole('Administrador');

        Permission::create(['name' => 'planes.index','description' => 'Ver listado de planes'])->assignRole('Administrador');
        Permission::create(['name' => 'planes.create','description' => 'Crear plan'])->assignRole('Administrador');
        Permission::create(['name' => 'planes.edit','description' => 'Editar plan'])->assignRole('Administrador');
        Permission::create(['name' => 'planes.destroy','description' => 'Eliminar plan'])->assignRole('Administrador');

        Permission::create(['name' => 'reservas.index','description' => 'Ver listado de reservas'])->syncRoles('Administrador','Asistente');
        Permission::create(['name' => 'reservas.create','description' => 'Crear reserva'])->syncRoles('Administrador','Asistente');
        Permission::create(['name' => 'reservas.edit','description' => 'Editar reserva'])->syncRoles('Administrador','Asistente');
        Permission::create(['name' => 'reservas.destroy','description' => 'Eliminar reserva'])->syncRoles('Administrador','Asistente');

        Permission::create(['name' => 'usuarios.index','description' => 'Ver listado de usuarios'])->assignRole('Administrador');
        Permission::create(['name' => 'usuarios.create','description' => 'Crear usuario'])->assignRole('Administrador');
        Permission::create(['name' => 'usuarios.edit','description' => 'Editar usuario'])->assignRole('Administrador');
        Permission::create(['name' => 'usuarios.destroy','description' => 'Eliminar usuario'])->assignRole('Administrador');

        Permission::create(['name' => 'pagos.index','description' => 'Ver listado de pagos'])->syncRoles('Administrador','Asistente');
        Permission::create(['name' => 'pagos.create','description' => 'Crear pago'])->syncRoles('Administrador','Asistente');
        Permission::create(['name' => 'pagos.edit','description' => 'Editar pago'])->syncRoles('Administrador');
        Permission::create(['name' => 'pagos.destroy','description' => 'Eliminar pago'])->syncRoles('Administrador');
    }
}
