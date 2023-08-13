<?php

namespace App\Http\Controllers;

use App\Events\CarEvents;
use App\Mail\purchased;
use App\Models\Car;
use App\Models\car_user;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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
        return view('cars.index', ['cars' => $cars]);

    }

    public function show($id)
    {
        $car = Car::find($id);
        $is_sold = car_user::where('car_id', $id)->get();
        if ($is_sold->count() == 0) {
            $is_sold = false;
        } else {
            $is_sold = true;
        }
        return view('cars.show', ['car' => $car, 'is_sold' => $is_sold]);
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store()
    {
        $validated = request()->validate(['model' => 'required', 'color' => 'required', 'price' => 'required', 'image' => 'required']);
        $car = new Car();
        $car->model = request('model');
        $car->color = request('color');
        $car->price = (int)request('price');
        $file = request('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('img', $filename);
        $car->image = $filename;
        error_log($car);
        $car->save();
        // create an event for the car creation

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
        // create an event for the car purchase
        Mail::to($user->email)->send(new purchased($user));
        CarEvents::dispatch($car);
    }

    public function view_cars($id)
    {
        $user_car = car_user::where('user_id', $id)->get();
        $cars = [];
        foreach ($user_car as $car) {
            $cars[] = Car::find($car->car_id);
        }
        $is_empty = false;
        if (count($cars) == 0) {
            $is_empty = true;
        }
        return view('cars.view_cars', ['cars' => $cars, 'is_empty' => $is_empty]);

    }

}
