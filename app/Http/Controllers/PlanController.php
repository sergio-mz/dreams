<?php

namespace App\Http\Controllers;

use App\Models\Dome;
use App\Models\Plan;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planes = Plan::all();
        return view('planes.index', compact('planes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $domos = Dome::all(); // Obtener todos los domos
        return view('planes.create', compact('domos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'description' => 'required',
            'dome_id' => 'required',
        ]);

        /* $role = new Role();

        $role->name = $request->name;

        $role->save(); */

        $plane = Plan::create($request->all()); /*otra forma de hacerlo*/

        return redirect()->route('planes.show', $plane->id); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plane)
    {
        return view('planes.show', ['plane' => $plane]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plane)
    {
        $domos = Dome::all(); // Obtener todos los domos
        $servicios = Service::where('status', '1')->get(); // Obtener todos los servicios
        return view('planes.edit', compact('plane', 'domos', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plane)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'description' => 'required',
            'dome_id' => 'required',
        ]);

        /*
        $caracteristica->name = $request->name;
        $caracteristica->status = $request->status;
        $caracteristica->description = $request->description;
        $caracteristica->price = $request->price;

        $caracteristica->save(); */
        
        $array = $request->all();
        Arr::forget($array, 'servicios');
        $plane->update($array); /*otra forma de hacerlo*/

        // Actualizar los domos y servicios asignados al plan
        $plane->services()->sync($request->input('servicios', []));

        return redirect()->route('planes.show', $plane->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plane)
    {
        $plane->delete();

        return redirect()->route('planes.index');
    }
}
