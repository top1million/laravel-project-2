<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\User;
use App\Models\car_user;
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
        $is_sold = car_user::where('car_id', $id)->get();
        if($is_sold->count() == 0){
            $is_sold = false;
        }else{
            $is_sold = true;
        }
        return view('cars.show', [
            'car' => $car,
            'is_sold' => $is_sold
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
    public function purchase($id)
    {
        $car = Car::find($id);
        $user = User::find(auth()->user()->id);
        $car_user = new car_user();
        $car_user->car_id = $car->id;
        $car_user->user_id = $user->id;
        $car_user->save();
        return redirect('/');
    }

    public function view_cars($id)
    {
        $user_car = car_user::where('user_id', $id)->get();
        $cars = [];
        foreach ($user_car as $car) {
            $cars[] = Car::find($car->car_id);
        }
        return view('cars.view_cars', [
            'cars' => $cars
        ]);
        
    }

}
