<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 100)->create()->each(function (App\Post $post){
            $post->tags()->attach([
                rand(1, 20),
            ]);
        });
    }
}
