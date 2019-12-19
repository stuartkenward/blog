<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    $user = App\User::InRandomOrder()->first();

    return [
        'title' => $faker->realText(24),
        'body' => $faker->realText(4000),
        'exerpt' => $faker->realText(250),
        'number_of_comments' => 0,
        'posted_by' => $user->name,
        'image' => $faker->sentence(1),
        'user_id' => $user->id
    ];
});