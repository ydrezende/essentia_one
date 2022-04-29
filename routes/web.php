<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', ClientController::class)->except(['show', 'update', 'destroy', 'edit']);

Route::get('/{client}', [ ClientController::class, 'show'] );
Route::delete('/{client}', [ ClientController::class, 'destroy'] );
Route::put('/{client}', [ ClientController::class, 'update'] );
Route::get('/{client}/edit', [ ClientController::class, 'edit'] );
