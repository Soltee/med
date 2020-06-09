<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'cover', 'name', 'price', 'quantity', 'prev_price', 'description'
    ];

    public function slug()
    {
    	return \Illuminate\Support\Str::slug($this->name);
    }
}
