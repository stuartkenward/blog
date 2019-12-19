<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $user = App\User::InRandomOrder()->first();
    
    return [
        'body' => $faker->realText(30),
        'user_id' => $user->id,
        'blog_post_id' => App\BlogPost::InRandomOrder()->first()->id,
        'posted_by' => $user->name
    ];
});
