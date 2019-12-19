<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    $user = App\User::InRandomOrder()->first();

    return [
        'title' => $faker->sentence(3),
        'body' => $faker->paragraph(80, true),
        'exerpt' => $faker->paragraph(8),
        'number_of_comments' => 0,
        'posted_by' => $user->name,
        'image' => $faker->sentence(1),
        'user_id' => $user->id
    ];
});