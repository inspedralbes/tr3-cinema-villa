<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\EntradaController;

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
Route::get('/session/{id}', [SessionsController::class, 'show']);
Route::get('/movie_session/{id}', [SessionsController::class, 'getByMovieId']);

Route::get('/entradas', [EntradaController::class, 'index']);
Route::post('/entradas', [EntradaController::class, 'create']);
Route::get('/session/{id}/entradas', [EntradaController::class, 'showWithIdSession']); 
Route::post('/entradas/validate', [EntradaController::class, 'validateEmail']);
Route::post('/entradas/searchIdEmail', [EntradaController::class, 'showWithEmailIdSession']);
Route::post('/entradas/searchEmail', [EntradaController::class, 'showWithEmail']);
Route::post('/entradas/totalPurchase', [EntradaController::class, 'showTotalPurchase']);