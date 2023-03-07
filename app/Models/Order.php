<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    //to change the type of any variable to any data type when moving data back and forth to the database
    protected $casts = [
        'toppings' => 'array'
    ];
}
