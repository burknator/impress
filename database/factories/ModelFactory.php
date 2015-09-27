<?php

$factory->define(Impress\Author::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email
    ];
});

$factory->define(Impress\Content::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => Illuminate\Support\Str::slug($faker->sentence),
        'text' => $faker->paragraph,
        'author_id' => factory(Impress\Author::class)->create()->id,
        'type_id' => factory(Impress\Type::class)->create()->id,
        'category_id' => factory(Impress\Category::class)->create()->id
    ];
});

$factory->define(Impress\Type::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(Impress\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(2),
        'slug' => $faker->slug,
        'color_id' => '1'
    ];
});

$factory->define(Impress\TagColor::class, function (Faker\Generator $faker) {
    return [
        'hex' => ltrim($faker->hexcolor, '#')
    ];
});

$factory->define(Impress\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->word,
        'color_id' => factory(Impress\CategoryColor::class)->create()->id
    ];
});

$factory->define(Impress\CategoryColor::class, function (Faker\Generator $faker) {
    return [
        'hex' => ltrim($faker->hexcolor, '#')
    ];
});