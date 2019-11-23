<?php

/** @var Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(30),
        'body' => $faker->realText(),
        'user_id' => factory(App\User::class),
    ];
});
