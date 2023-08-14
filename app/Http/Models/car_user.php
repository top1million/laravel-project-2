<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car_user extends Model
{
    use HasFactory;
    protected $table = 'car_user';
    protected $fillable = ['car_id', 'user_id'];


}
