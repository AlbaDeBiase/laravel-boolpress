<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use\App\Post;
use\App\Category;
use\App\Tag;

class PostController extends Controller
{
    public function index() {
        $data = [
            'posts'=>Post::all()
        ];
        return view('admin.posts.index', $data);
    }

    public function show($slug) {
        $post= Post::where('slug', $slug)->first();
        if(!$post) {
            abort(404);
        }

        $data = ['post'=>$post];
        return view('guest.posts.show', $data);

    }

    public function create() {
        $data = [
            'categories'=> Category::all(),
            'tags'=> Tag::all()
        ];
        return view('admin.posts.create', $data);

    }

    public function edit(Post $post)
      {
          if(!$post) {
              abort(404);
          }

          $data = [
              'post' => $post,
              'categories' => Category::all(),
              'tags'=> Tag::all()
          ];

          return view('admin.posts.edit', $data);
      }



    public function update(Request $request, Post $post)
     {

      $form_data = $request->all();
      // verifico se il titolo ricevuto dal form è diverso dal vecchio titolo
      if($form_data['title'] != $post->title) {
          // è stato modificato il titolo => devo modificare anche lo slug
       // Genero lo slug dal titolo ma..
          $slug = Str::slug($form_data['title']);
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
          // quando esco dal while sono sicuro che lo slug non esiste nel db
          // assegno lo slug al post
          $form_data['slug'] = $slug;
        }
      $post->update($form_data);
      return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
   {
       $post->delete();
       return redirect()->route('admin.posts.index');
   }

   public function store(Request $request)
{
    $form_data = $request->all();
    $new_post = new Post();
    $new_post->fill($form_data);
        // Genero lo slug dal titolo ma..
        $slug = Str::slug($new_post->title);
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
    // quando esco dal while sono sicuro che lo slug non esiste nel db
    // assegno lo slug al post
        $new_post->slug = $slug;
        $new_post->save();
        return redirect()->route('admin.posts.index');
}


}
