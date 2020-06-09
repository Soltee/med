<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->unique()->name();
    return [
        'category_id' => function(){
            $category = Category::inRandomOrder()->pluck('id')->toArray();
            return  Arr::random($category);
        },
        'cover' => function(){
        	$images = [
        		'http://localhost:8000/posts/1.png',
        		'http://localhost:8000/posts/2.png',
        		'http://localhost:8000/posts/3.png',
        		'http://localhost:8000/posts/4.png',
        		'http://localhost:8000/posts/5.png'
        	];

        	return \Illuminate\Support\Arr::random($images);
        },
        'title' => $title,
        'slug' => Str::slug($title),
        'content' => $faker->text($maxNbChars = 200)
    ];
});

