<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {

    $title =  $faker->sentence(5);
    $slug  = Str::slug($title, '-');

    return [
        'name' => $title,
        'slug' => $slug,
        'body' => $faker->text(500),
        
    ];
});
