<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all movies (id, title, image) from the database
        $movies = Movies::all(['id', 'title', 'image']);

        return response()->json($movies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $fildsets = $request->validate([
            'image' => 'required|unique:movies',
            'title' => 'required|unique:movies',
            'director' => 'required',
            'sinopsis' => 'required',
            'duration' => 'required',
            'classification' => 'required'
        ]);

        $movie = new Movies();

        $movie["image"] = $fildsets["image"];
        $movie["title"] = $fildsets["title"];
        $movie["director"] = $fildsets["director"];
        $movie["actors"] = $fildsets["actors"];
        $movie["sinopsis"] = $fildsets["sinopsis"];
        $movie["duration"] = $fildsets["duration"];
        $movie["premiere"] = $fildsets["premiere"];
        $movie["genre"] = $fildsets["genre"];
        $movie["classification"] = $fildsets["classification"];

        if ($movie->save()) {
            // Movie saved successfully
            return response()->json(['message' => 'Movie created successfully'], 201);
        } else {
            // Failed to save the movie
            return response()->json(['message' => 'Failed to create the movie'], 500);
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
    public function show(Movies $movies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movies $movies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movies $movies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movies $movies)
    {
        //
    }
}
