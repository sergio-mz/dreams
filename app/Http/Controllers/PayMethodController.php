<?php

namespace App\Http\Controllers;

use App\Models\PayMethod;
use Illuminate\Http\Request;

class PayMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metodos = PayMethod::orderBy('id', 'asc')->paginate(3);
        return view('metodos.index', compact('metodos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('metodos.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'name' => 'required',
        ]);

        /* $metodo = new PayMethod();

        $metodo->name = $request->name;

        $metodo->save(); */

        $metodo = PayMethod::create($request->all()); /*otra forma de hacerlo*/

        return redirect()->route('metodos.show', $metodo->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(PayMethod $metodo)
    {
         /* compact('metodo'); es lo mismo que: ['metodo' => $metodo] */
         return view('metodos.show', ['metodo' => $metodo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PayMethod $metodo)
    {
        return view('metodos.edit', compact('metodo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PayMethod $metodo)
    {
        $request->validate([
            'name' => 'required',
          
        ]);

        /*
        $metodo->name = $request->name;

        $metodo->save(); */

        $metodo->update($request->all()); /*otra forma de hacerlo*/

        return redirect()->route('metodos.show', $metodo->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PayMethod $metodo)
    {
        $metodo->delete();

        return redirect()->route('metodos.index');
    }
}
