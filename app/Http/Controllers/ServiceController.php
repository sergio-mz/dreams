<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $servicios =Service::all();
        return view('servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'name' => 'required',
        ]);

        /* $servicio = new servicio();

        $servicio->name = $request->name;

        $servicio->save(); */

        $servicio = Service::create($request->all()); /*otra forma de hacerlo*/

        return redirect()->route('servicios.show', $servicio->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $servicio)
    {
         /* compact('servicio'); es lo mismo que: ['servicio' => $servicio] */
         return view('servicios.show', ['servicio' => $servicio]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $servicio)
    {
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $servicio)
    {
        $request->validate([
            'name' => 'required',
          
        ]);

        /*
        $servicio->name = $request->name;

        $servicio->save(); */

        $servicio->update($request->all()); /*otra forma de hacerlo*/

        return redirect()->route('servicios.show', $servicio->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $servicio)
    {
        $servicio->delete();

        return redirect()->route('servicios.index');
    }
}