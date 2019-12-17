<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'body' => $faker->paragraph(80, true),
        'exerpt' => $faker->paragraph(8),
        'user_id' => App\User::InRandomOrder()->first()->id
    ];
});