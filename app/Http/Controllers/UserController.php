<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;

class UserController extends Controller
{
//Route::get( '/users', [UserController::class, 'index']);
// Route::get( '/users/{id}', [UserController::class, 'show']);
// Route::get( '/users/create', [UserController::class, 'create']);
// Route::post( '/users', [UserController::class, 'store']);
// Route::delete( '/users/{id}', [UserController::class, 'destroy']);
// Route::get( '/users/{id}/edit', [UserController::class, 'edit']);
// Route::put( '/users/{id}', [UserController::class, 'update']);
    public function index()
    {
        $users = User::all();
        return view('users.index', $users);
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', $user);
    }
    public function create()
    {
        return view('users.create');
    }
    public function store()
    {
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->save();
        return redirect('/users');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', $user);
    }
    public function update($id)
    {
        $user = User::find($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->save();
        return redirect('/users');
    }

}
