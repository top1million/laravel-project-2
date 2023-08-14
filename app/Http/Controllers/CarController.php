<?php

namespace App\Http\Controllers;

use App\Events\CarEvents;
use App\Http\Models\Car;
use App\Http\Models\car_user;
use App\Http\Models\User;
use App\Http\Requests\Validations;
use App\Mail\purchased;
use Illuminate\Support\Facades\Mail;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::orderby('id')->get();
        return view('cars.index', ['cars' => $cars]);
    }

    public function show($id)
    {
        $car = Car::find($id);
        $is_sold = car_user::where('car_id', $id)->get()->count() == 0 ? false : true;
        return view('cars.show', ['car' => $car, 'is_sold' => $is_sold]);
    }

    public function store(Validations $request)
    {
        $validated = $request->validated();
        $file = request('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('img', $filename);
        Car::create(['model' => ['model'], 'color' => ['color'], 'price' => ['price'], 'image' => $filename]);
        return redirect('/');
    }

    public function create()
    {
        return view('cars.create');
    }

    public function purchase($id)
    {
        $car = Car::find($id);
        $user = User::find(auth()->user()->id);
        car_user::create(['car_id' => $car->id, 'user_id' => $user->id]);
        // create an event for the car purchase
        Mail::to($user->email)->send(new purchased($user));
        CarEvents::dispatch($car);
        return redirect('/');
    }

    public function view_cars($id)
    {
        $user = User::find(auth()->user()->id);
        $cars = $user->cars;
        return view('cars.view_cars', ['cars' => $cars]);
    }
    public function cards()
    {
        $cars = Car::orderby('id')->get();
//        paginate every 2 cars
        $cars = Car::paginate(2);
        return view('cars.cards', ['cars' => $cars]);
    }

}
