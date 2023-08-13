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
Route::get('/cars/create', [CarController::class, 'create'])->middleware(\App\Http\Middleware\checkAdmin::class); // only if admin
Route::get('/cars/{id}', [CarController::class, 'show']);
Route::post('/cars', [CarController::class, 'store'])->middleware(\App\Http\Middleware\checkAdmin::class);
// purchase only if user is verified
//<form action="/cars/{{ $car->id }}/purchase" method="POST">
//    @csrf
//            @method('post')
//            @if ($is_sold == false)
//            <button class="btn btn-danger mx-5">Complete Order</button>
//@else
//            <h1 class="text-danger d-inline">SOLD</h1>
//@endif
//            <a href="/" class="btn btn-dark d-inline mx-5">Back</a>
//
//
//        </form>
Route::post('/cars/{id}/purchase', [CarController::class, 'purchase'])->middleware('verified');
Route::get('/view_cars/{id}', [CarController::class, 'view_cars'])->middleware('auth');
Auth::routes(
    [
        'verify' => true,
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
