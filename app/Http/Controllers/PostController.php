<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Attribute;

class PostController  extends Controller
{
    public function index () {
        $posts = Post::all();

        return view('posts', compact('posts'));
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
        dd('created');
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
        dd('updated');
    }
    
    public function delete () {
        $post = Post::withTrashed()->find(2);

        $post->restore();
        dd('deleted');
    }

    public function firstOrCreate() {
        
        $anotherPost = [
                'title' => 'some post from VSC',
                'content' => 'some post',
                'image' => 'image2000.jpeg',
                'likes' => '123 ',
                'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'some title'
        ], 
        [
            'title' => 'some different title',
            'content' => 'some different post',
            'image' => 'image20.jpeg',
            'likes' => '321 ',
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finish');
    }

    public function updateOrCreate () {
        $anotherPost = [
                'title' => 'not some title',
                'content' => 'its not update post',
                'image' => 'image5.jpeg',
                'likes' => '3000',
                'is_published' => 1,
        ];

        $post = Post::updateOrCreate(['title' => 'not some title'],$anotherPost);
        dump($post->content);
        dd('finish');
    }
}
