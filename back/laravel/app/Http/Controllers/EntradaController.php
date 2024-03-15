<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entradas = Entrada::all();
        return response()->json($entradas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $fildsets = $request->validate([
            'session_id' => 'required',
            'price' => 'required',
            'seat'=> 'required',
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number'=> 'required',
        ]);

        $entrada = new Entrada();

        $entrada["session_id"] = $fildsets["session_id"];
        $entrada["price"] = $fildsets["price"];
        $entrada["seat"] = $fildsets["seat"];
        $entrada["email"] = $fildsets["email"];
        $entrada["first_name"] = $fildsets["first_name"];
        $entrada["last_name"] = $fildsets["last_name"];
        $entrada["phone_number"] = $fildsets["phone_number"];

        if ($entrada->save()) {
            // Entrada saved successfully
            return response()->json(['message' => 'NEW Entrada created successfully'], 201);
        } else {
            // Failed to save the entrada
            return response()->json(['message' => 'Failed to create the NEW Entrada'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrada $entrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrada $entrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrada $entrada)
    {
        //
    }
}
