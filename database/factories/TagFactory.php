<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Tag;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Tag::class, function (Faker $faker) {
    
    $title = $faker->unique()->word(5);
    $slug  = Str::slug($title);
    
    return [
        'name' => $title,
        'slug' => $slug,
    ];
});
