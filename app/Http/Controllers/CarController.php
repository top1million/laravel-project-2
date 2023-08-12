<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\User;
class CarController extends Controller
{
// Route::get( '/cars', [CarController::class, 'index']);
// Route::get( '/cars/{id}', [CarController::class, 'show']);
// Route::get( '/cars/create', [CarController::class, 'create']);
// Route::post( '/cars', [CarController::class, 'store']);
// Route::delete( '/cars/{id}', [CarController::class, 'destroy']);
// Route::get( '/cars/{id}/edit', [CarController::class, 'edit']);
// Route::put( '/cars/{id}', [CarController::class, 'update']);
    public function index()
    {
        $cars = Car::orderby('id', 'desc')->get();
        error_log($cars);
        return view('cars.index', [
            'cars' => $cars
        ]);

    }
    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show', [
            'car' => $car
        ]);
    }
    public function create()
    {
        return view('cars.create');
    }
    public function store()
    {
        $car = new Car();
        $car->model = request('model');
        $car->color = request('color');
        $car->price = (int) request('price');
        $file = request('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('img', $filename);
        $car->image = $filename;        
        error_log ($car);
        $car->save();
        return redirect('/');
    }
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect('/cars');
    }



}
