<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PublicController::class, 'index']);
Route::get('/edit/{id:id}', [PublicController::class, 'edit']);

Route::post('adddata', [PublicController::class, 'store']);
Route::post('delete/{identity:id}', [PublicController::class, 'delete']);
Route::post('update', [PublicController::class, 'update']);