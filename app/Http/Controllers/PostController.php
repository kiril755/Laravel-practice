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
        
        // dd($post->moder);
    }

    public function create () {
        $postsArr = [
            [
                'title' => 'firts title of post from VSC',
                'content' => 'first content of post',
                'image' => 'image.jpeg',
                'likes' => '100',
                'is_published' => 1,
            ],
            [
                'title' => 'second title of post from VSC',
                'content' => 'second content of post',
                'image' => 'image2.jpeg',
                'likes' => '200',
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        };
    }

    public function update () {
         $post = Post::find(6);
         $post->update(
                ['title' => 'updated',
                'content' => 'updated',
                'image' => 'updated',
                'likes' => 1000,
                'is_published' => 1,
                ]
         );
        dd('done');
    }
}
