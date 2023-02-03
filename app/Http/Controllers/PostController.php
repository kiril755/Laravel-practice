<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Attribute;

class PostController  extends Controller
{
    public function index () {
        $posts = Post::where('is_published', 1)->first(); 
        // foreach ($posts as $post) {
        //     dump($post->title);
        // }
        $
        // dd($post->moder);
    }
}
