<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph(1),
        'user_id' => App\User::InRandomOrder()->first()->id,
        'blog_post_id' => App\BlogPost::InRandomOrder()->first()->id
    ];
});
