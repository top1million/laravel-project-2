<?php

use App\Http\Controllers\CarController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
// import auth
use Illuminate\Support\Facades\Auth;
// import middleware auth


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */


Route::get('/', [CarController::class, 'index']);
Route::get('/cars/create', [CarController::class, 'create']);
Route::get('/cars/{id}', [CarController::class, 'show']);
Route::post('/cars', [CarController::class, 'store']);
Route::delete('/cars/{id}', [CarController::class, 'purchase'])->middleware('auth');
Route::get('/view_cars/{id}', [CarController::class, 'view_cars'])->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
