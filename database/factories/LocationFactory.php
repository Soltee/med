<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Location;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'user_id' => function() {
        	$users = User::inRandomOrder()->pluck('id')->toArray();
        	return Arr::random($users);
        },
        'address' => $faker->address,
        'latitude' => $faker->latitude($min = -90, $max = 90),
        'longitude' => $faker->longitude($min = -90, $max = 90)
    ];
});
