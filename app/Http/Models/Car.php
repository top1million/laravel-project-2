<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';
//    fields that can be mass assigned
    protected $fillable = ['model', 'color', 'price', 'image'];

    //retrive is the car has an owner (user) belongstoone

}

