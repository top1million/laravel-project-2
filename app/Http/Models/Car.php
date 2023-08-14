<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    protected $table = 'car';
//    fields that can be mass assigned
    protected $fillable = ['model', 'color', 'price', 'image'];

    //retrive is the car has an owner (user) belongstoone
    public function images(): HasMany
    {
        return $this->hasMany(Images::class);
    }

}

