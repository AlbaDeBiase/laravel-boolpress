<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Faker\Generator as Faker;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) {

            $newTag = new Tag();
            $newTag->name = $faker->name();
            // Genero lo slug dal titolo ma..
            $slug = Str::slug($newTag->title);
            $slug_root = $slug;
            // lo slug potrebbe essere uguale ad un altro, quindi aggiungo controlli
            $slug_exist = Tag::where('slug',$slug)->first();
            $counter= 1;
            // eseguo un ciclo while per verificare se ho trovato 2 slug uguali
            while($slug_exist){
                // genero uno slag diverso
                $slug = $slug_root . '-' . $counter;
                $counter++;
                $slug_exist = Tag::where('slug',$slug)->first();
            }

            // esco dal ciclo e sono sicura che non ci sono 2 slug uguali
            // assegno uno slug univoco al tag
            $newTag->slug = $slug;
            $newTag->save();
        }
    }
}
