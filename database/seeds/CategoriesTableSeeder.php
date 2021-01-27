<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) {

            $newCategory = new Category();
            $newCategory->name = $faker->name();
            // Genero lo slug dal titolo ma..
            $slug = Str::slug($newCategory->title);
            $slug_root = $slug;
            // lo slug potrebbe essere uguale ad un altro, quindi aggiungo controlli
            $slug_exist = Category::where('slug',$slug)->first();
            $counter= 1;
            // eseguo un ciclo while per verificare se ho trovato 2 slug uguali
            while($slug_exist){
                // genero uno slag diverso
                $slug = $slug_root . '-' . $counter;
                $counter++;
                $slug_exist = Category::where('slug',$slug)->first();
            }

            // esco dal ciclo e sono sicura che non ci sono 2 slug uguali
            // assegno uno slug univoco alla categoria
            $newCategory->slug = $slug;
            $newCategory->save();
        }
    }
}
