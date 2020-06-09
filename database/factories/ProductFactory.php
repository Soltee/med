<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'cover'  => function(){
        	$images = [
        		'http://localhost:8000/products/1.png',
        		'http://localhost:8000/products/2.png',
        		'http://localhost:8000/products/3.png',
        		'http://localhost:8000/products/4.png',
        		'http://localhost:8000/products/5.png'
        	];

        	return \Illuminate\Support\Arr::random($images);
        },
        'name'  => $faker->title,
        'prev_price' => $faker->numberBetween(1, 50),
        'price' => $faker->numberBetween(50, 100),
        'quantity'   => $faker->numberBetween(1, 20),
        'description' => $faker->text($maxNbChars = 200)  
    ];
});
