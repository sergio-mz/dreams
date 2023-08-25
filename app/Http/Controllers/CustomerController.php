<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Customer::orderBy('id', 'desc')->paginate();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'document' => 'required|max:20',
            'name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|max:100',
            'cellphone' => 'required|max:20',
            'city' => 'required|max:20',
            'address' => 'max:50',
        ]);

        $cliente = Customer::create($request->all());  /*otra forma de hacerlo*/
        $cliente->id = $request->id;

        return redirect()->route('clientes.show',$cliente->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $cliente)
    {
        $request->validate([
            'document' => 'required|max:20',
            'name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|max:100',
            'cellphone' => 'required|max:20',
            'city' => 'required|max:20',
            'address' => 'max:50',
        ]);
        
        $cliente->update($request->all()); /*otra forma de hacerlo*/

        return redirect()->route('clientes.show', $cliente->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index');
    }
}
