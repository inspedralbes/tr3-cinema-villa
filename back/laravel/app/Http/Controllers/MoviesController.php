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
        $movies = Movies::all(['id_movie', 'title', 'image']);

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
            'actors' => 'array',
            'sinopsis' => 'required',
            'premiere' => 'date',
            'genre' => 'string',
            'duration' => 'required',
            'classification' => 'required'
        ]);

        $movie = new Movies();

        $movie["image"] = $fildsets["image"];
        $movie["title"] = $fildsets["title"];
        $movie["director"] = $fildsets["director"];
        $movie["actors"] = json_encode($fildsets["actors"]);
        $movie["sinopsis"] = $fildsets["sinopsis"];
        $movie["duration"] = $fildsets["duration"] + " minutos";
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
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // Find the movie by its id
        $movie = Movies::where('id_movie', $request->id)->first();

        if ($movie) {
            // Movie found, return the movie data
            return response()->json($movie);
        } else {
            // Movie not found
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Find the movie by its id
        $movie = Movies::where('id_movie', $request->id)->first();

        if ($movie) {
            // Update the movie with the data from the request JSON
            $movie->update($request->all());
            // Movie updated successfully
            return response()->json(['message' => 'Movie updated successfully'], 200);
        } else {
            // Movie not found
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the movie by its id
        $movie = Movies::where('id_movie', $id)->first();

        if ($movie) {
            // Delete the movie
            $movie->delete();
            // Movie deleted successfully
            return response()->json(['message' => 'Movie deleted successfully'], 200);
        } else {
            // Movie not found
            return response()->json(['message' => 'Movie not found'], 404);
        }
    
    }

    public function movieWithoutSession()
    {
        $movies = Movies::doesntHave('sessions')->get(['id_movie', 'title']);

        return response()->json($movies);
    }
}