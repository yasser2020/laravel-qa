<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'title'=>trim($faker->sentence(rand(5,7)),"."),
        'body'=>$faker->paragraphs(rand(3,7),true),
        'views'=>rand(0,10),
        'anwsers'=>rand(0,10),
        'votes'=>rand(-3,10)

    ];
});
