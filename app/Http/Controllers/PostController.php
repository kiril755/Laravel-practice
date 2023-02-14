<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
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
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags')); 
    }
    
    public function store () {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        
        $tags = $data['tags'];
        unset($data['tags']);
        
        $post = Post::create($data);
        
        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show (Post $post) {
        return view('post.show', compact('post'));
    } 

    public function edit (Post $post) {
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update (Post $post) {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
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
