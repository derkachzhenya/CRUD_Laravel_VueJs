<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\Post\PostResource;

class PostController extends Controller
{
    
    public function index()
    {
        
        $posts = Post::all();
        $posts = PostResource::collection($posts)->resolve();
        return inertia('Post/Index', compact('posts'));
    }

    
    public function create()
    {
        return inertia('Post/Create');
    }

   
    public function store(StorePostRequest $request)
    {
        Post::create($request->validated());
        return redirect()->route('post.index');
    }

  
    public function show(Post $post)
    {
        
        return inertia('Post/Show', compact('post'));
    }

 
    public function edit(Post $post)
    {
        return inertia('Post/Edit', compact('post'));
    }

    
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return redirect()->route('post.index');
    }

    
    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
            
    }
}
