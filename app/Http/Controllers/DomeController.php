<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use App\Models\Dome;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domos = Dome::orderBy('name', 'desc')->paginate();
        return view('domos.index', compact('domos'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('domos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'price' => 'required',
            'location'=> 'required',
            'description' => 'required',
            'capacity'=>'required', 
        ]);

        /* $role = new Role();

        $role->name = $request->name;

        $role->save(); */

        $domo = Dome::create($request->all()); /*otra forma de hacerlo*/

        return redirect()->route('domos.show', $domo->id);  
    }

    /**
     * Display the specified resource.
     */
    public function show(Dome $domo)
    {
        return view('domos.show', ['domo' => $domo]);
    }    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dome $domo)
    {
        $caracteristicas = Characteristic::all(); // Obtener todos los permisos
        return view('domos.edit', compact('domo', 'caracteristicas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dome $domo)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'price' => 'required',
            'location'=> 'required',
            'description' => 'required',
            'capacity'=>'required',
        ]);

        /*
        $caracteristica->name = $request->name;
        $caracteristica->status = $request->status;
        $caracteristica->description = $request->description;
        $caracteristica->price = $request->price;

        $caracteristica->save(); */
        
        $array = $request->all();
        Arr::forget($array, 'caracteristicas');
        $domo->update($array); /*otra forma de hacerlo*/

        // Actualizar las caracteristicas asignados al domo
        $domo->characteristics()->sync($request->caracteristicas);

        return redirect()->route('domos.show', $domo->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dome $domo)
    {
        $domo->delete();

        return redirect()->route('domos.index');
    }
}
