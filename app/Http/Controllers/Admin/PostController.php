<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function(){
        $data =[
            'posts'->Post::all()
        ];
        return view('admin.posts.index';$data);
    }
}
