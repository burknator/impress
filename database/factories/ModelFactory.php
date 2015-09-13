<?php

$factory->define(Impress\Author::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email
    ];
});
