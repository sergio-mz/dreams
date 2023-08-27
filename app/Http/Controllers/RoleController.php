<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'asc')->paginate(3);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        /* $role = new Role();

        $role->name = $request->name;

        $role->save(); */

        $role = Role::create([
            'name'=>$request->name,
            'status'=>1,
        ]); /*otra forma de hacerlo*/

        return redirect()->route('roles.show', $role->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        /* compact('role'); es lo mismo que: ['role' => $role] */
        return view('roles.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all(); // Obtener todos los permisos
        return view('roles.edit', compact('role', 'permissions'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role->name = $request->name;
        $role->status = $request->status;

        $role->save();

        /* $role->update($request->all()); */ /*otra forma de hacerlo*/

        // Actualizar los permisos asignados al rol
        /* $role->permissions()->sync($request->input('permissions', [])); */
        /* $role->permissions()->sync($request->permissions); */
        $role->syncPermissions($request->input('permissions', []));
    
        return redirect()->route('roles.show', $role->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index');
    }
}
