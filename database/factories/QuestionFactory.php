<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
        'question' => $faker->sentence,
        'difficulty' => function () {
            return mt_rand(1, 3);
        },
        'explanation' => $faker->sentence,
        'is_enabled' => true,
        'answer1' => $faker->sentence,
        'answer2' => $faker->sentence,
        'answer3' => $faker->sentence,
        'answer4' => $faker->sentence
    ];
});
