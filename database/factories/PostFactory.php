<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {

    $title =  $faker->sentence(5);
    $slug  = Str::slug($title, '-');
    return [
        'user_id'     => factory(App\User::class),
        'Category_id' => factory(App\Category::class),
        'name'        => $title,
        'slug'        => $slug,
        'excerpt'     => $faker->text(200),
        'body'        => $faker->text(500),
        'file'        => $faker->imageUrl($width = 700, $height = 300),
        'status' => $faker->randomElement(['DRAFT', 'PUBLISHED']),
        
    ];
});
