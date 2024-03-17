<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\SessionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/movies', [MoviesController::class, 'index']);
Route::post('/addMovie', [MoviesController::class,'create']);
Route::get('/movie/{id}', [MoviesController::class, 'show']);

Route::get('/sessions', [SessionsController::class, 'index']);
Route::post('/addSession', [SessionsController::class,'create']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
