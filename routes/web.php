<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//import checkAdmin
use App\Http\Middleware\CheckAdmin;
// import auth

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

//group middleware checkadmin
Route::group(['middleware' => [ 'checkAdmin']], function () {

});
Route::get('/cars/create', [CarController::class, 'create']);
Route::post('/cars', [CarController::class, 'store']);
Route::get('/', [CarController::class, 'index']);
Route::get('/cars/{id}', [CarController::class, 'show']);
Route::post('/cars/{id}/purchase', [CarController::class, 'purchase'])->middleware('verified');
Route::get('/view_cars/{id}', [CarController::class, 'view_cars'])->middleware('auth');
Auth::routes(['verify' => true,]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/cards', [CarController::class, 'cards']);
Route::get('/cards', [CarController::class, 'cards']);
