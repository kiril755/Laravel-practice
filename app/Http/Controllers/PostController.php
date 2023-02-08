<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Attribute;

class PostController  extends Controller
{
    public function index () {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create () {
        return view('post.create'); 
    }
    
    public function store () {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show (Post $post) {
        return view('post.show', compact('post'));
    } 

    public function edit (Post $post) {
        return view('post.edit', compact('post'));
    }

    public function update (Post $post) {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }
    
    public function destroy (Post $post) { 
        $post->delete();
        return redirect()->route('post.index');
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
