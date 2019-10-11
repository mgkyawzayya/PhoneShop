<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'qty', 'price', 'itemcode', 'created_at'
    ];

    protected $dates = ['created_at'];

}
