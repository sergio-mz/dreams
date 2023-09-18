<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'document' => 'required|min:8|max:50',
            'name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|max:100',
            'cellphone' => 'required|max:50',
            'address' => 'required|max:100',
            'city' => 'required|max:50',
            'birthday' => 'required',
            'gender' => 'required',
            'password' => 'required|min:8',
            'status' => 'required',
        ]);

        $usuario = User::create([
            'document' => $request->document,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'cellphone' => $request->cellphone,
            'address' => $request->address,
            'city' => $request->city,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'password' => bcrypt($request->password),
            'status' => $request->status,
        ]);

        return redirect()->route('usuarios.show',$usuario->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        $roles = Role::where('status', '1')->get(); // Obtener todos los permisos
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'document' => 'required|min:8|max:50',
            'name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|max:100',
            'cellphone' => 'required|max:50',
            'address' => 'required|max:100',
            'city' => 'required|max:50',
            'birthday' => 'required',
            'gender' => 'required',
            'password' => 'required|min:8',
            'status' => 'required',
        ]);
        
        $usuario->update([
            'document' => $request->document,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'cellphone' => $request->cellphone,
            'address' => $request->address,
            'city' => $request->city,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'password' => bcrypt($request->password),
            'status' => $request->status,
        ]);

        $usuario->assignRole($request->role);

        return redirect()->route('usuarios.show', $usuario->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index');
    }
}
