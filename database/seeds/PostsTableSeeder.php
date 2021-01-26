<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
            // Genero lo slug dal titolo ma..
            $slug = Str::slug($newPost->title);
            $slug_root = $slug;
            // lo slug potrebbe essere uguale ad un altro, quindi aggiungo controlli
            $slug_exist = Post::where('slug',$slug)->first();
            $counter= 1;
            // eseguo un ciclo while per verificare se ho trovato 2 slug uguali
            while($slug_exist){
                // genero uno slag diverso
                $slug = $slug_root . '-' . $counter;
                $counter++;
                $slug_exist = Post::where('slug',$slug)->first();
            }

            // esco dal ciclo e sono sicura che non ci sono 2 slug uguali
            // assegno uno slug univoco al post
            $newPost->slug = $slug;
            $newPost->save();
        }
    }
}
