<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use\App\Post;
use\App\Category;

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
            'categories'=>Category::all()
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
              'categories' => Category::all()
          ];

          return view('admin.posts.edit', $data);
      }


}
