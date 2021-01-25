<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) {

            $newPost = new Post();
            $newPost->author = $faker->name();
            $newPost->title = $faker->sentence(3);
            $newPost->text = $faker->text(250);
            $newPost->date = $faker->date();
            $newPost->save();
        }
    }
}
