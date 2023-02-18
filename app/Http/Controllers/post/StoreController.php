<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;


class StoreController  extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validate();
        
        $tags = $data['tags'];
        unset($data['tags']);
        
        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }
}
