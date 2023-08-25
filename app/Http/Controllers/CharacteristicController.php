<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use Illuminate\Http\Request;

class CharacteristicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $caracteristicas = Characteristic::orderBy('id', 'desc')->paginate();
        return view('caracteristicas.index', compact('caracteristicas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('caracteristicas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        /* $caracteristica = new Caracteristica();

        $caracteristica->name = $request->name;
        $caracteristica->descripcion = $request->descripcion;
        $caracteristica->categoria = $request->categoria;

        $caracteristica->save(); */

        $caracteristica = Characteristic::create($request->all()); /*otra forma de hacerlo*/
        
        return redirect()->route('caracteristicas.show', $caracteristica->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Characteristic $caracteristica)
    {
        /* compact('caracteristica'); es lo mismo que: ['caracteristica' => $caracteristica] */
        return view('caracteristicas.show', ['caracteristica' => $caracteristica]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Characteristic $caracteristica)
    {
        return view('caracteristicas.edit', compact('caracteristica'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Characteristic $caracteristica)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        /*
        $caracteristica->name = $request->name;
        $caracteristica->status = $request->status;
        $caracteristica->description = $request->description;
        $caracteristica->price = $request->price;

        $caracteristica->save(); */

        $caracteristica->update($request->all()); /*otra forma de hacerlo*/

        return redirect()->route('caracteristicas.show', $caracteristica->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Characteristic $caracteristica)
    {
        $caracteristica->delete();

        return redirect()->route('caracteristicas.index');
    }
}
