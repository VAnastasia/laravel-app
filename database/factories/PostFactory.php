<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $images = [
        'uploads/image1.jpg',
        'uploads/image2.jpg',
        'uploads/image3.jpg',
        'uploads/image4.jpg',
        'uploads/image5.jpg',
        'uploads/image6.jpg',
        'uploads/image7.jpg',
    ];

    return [
        'title' => $faker->realText(30),
        'description' => $faker->realText(600),
        'image' => $images[rand(0, 6)],
        'status' => true,
        'like_count' => rand(0, 1000)
    ];
});
