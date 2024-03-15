<?php

namespace App\Http\Controllers;

use App\Models\Sessions;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Sessions::all();

        return response()->json($sessions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $fildsets = $request->validate([
            'day' => 'required|unique:sessions',
            'hour' => 'required',
            'movie_id'=> 'required',
        ]);

        $session = new Sessions();

        $session["day"] = $fildsets["day"];
        $session["hour"] = $fildsets["hour"];
        $session["movie_id"] = $fildsets["movie_id"];

        if ($session->save()) {
            // Session saved successfully
            return response()->json(['message' => 'NEW Session created successfully'], 201);
        } else {
            // Failed to save the session
            return response()->json(['message' => 'Failed to create the NEW Session'], 500);
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
    public function show(Sessions $sessions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sessions $sessions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sessions $sessions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sessions $sessions)
    {
        //
    }
}
