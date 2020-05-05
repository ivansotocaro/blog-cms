<?php

use Illuminate\Database\Seeder;

class tagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tag::class, 20)->create();
    }
}
