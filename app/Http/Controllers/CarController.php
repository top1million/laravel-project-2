<?php

namespace App\Http\Controllers;

use App\Events\CarEvents;
use App\Http\Models\Car;
use App\Http\Models\car_user;
use App\Http\Models\Images;
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
        $images = $car->images;
        $is_sold = car_user::where('car_id', $id)->get()->count() == 0 ? false : true;
        return view('cars.show', ['car' => $car, 'is_sold' => $is_sold], ['images' => $images]);
    }

//    function to accept request

    public function store(Validations $request)
    {
        $request->validated();
        $index = 0;
        $first_image = "";
        foreach ($request->file('images') as $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = $index . time() . '.' . $extension;
            $file->move('img', $filename);
            if ($index == 0) {
                $first_image = $filename;
                $car = Car::create(['model' => $request->input('model'), 'color' => $request->input('color'), 'price' => $request->input('price'), 'image' => $first_image]);
            }
            error_log($filename);
            Images::create(['car_id' => $car->id, 'image' => $filename]);
            $index++;
        }
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

    public function edit($id)
    {
        $car = Car::find($id);
        $images = $car->images;
        return view('cars.edit', ['car' => $car], ['images' => $images]);
    }

    public function update(Validations $request, $id)
    {
        $request->validated();
        $car = Car::find($id);
        $car->update(['model' => $request->input('model'), 'color' => $request->input('color'), 'price' => $request->input('price')]);
        return redirect('/cars/' . $car->id);
    }

    public function destroy($id)
    {
        $car = Car::find($id);
        $images = $car->images;
        $car_user = car_user::where('car_id', $id)->get();
        foreach ($car_user as $car_user) {
            $car_user->delete();
        }
        foreach ($images as $image) {
            $image->delete();
        }
        $car->delete();
        return redirect('/');
    }

    public function imagesDelete($id)
    {
        $image = Images::find($id);
        $image->delete();
        return response()->json(['success' => 'User Deleted Successfully!']);
    }

}
