<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return  view("post.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'title' => trim($request->title),
            'content' => trim($request->content),
            'description' => trim($request->description),
        ]);

        $request->validate([
            'title'=> 'required|string|max:30',
            'content'=> 'required|string|max:30',
            'description'=> 'required|string|max:255',
        ]);
         //
        $post = new Post;

        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;

        $post->save();

        return redirect()->route('post.create')->with('success', 'Post creado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $id = $post->id;
        $postOne = Post::find($id);
        return view("post.show", compact('postOne'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $id = $post->id;
        $postOne = Post::find($id);
        return view("post.edit", compact('postOne'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=> 'required|string|max:30',
            'content'=> 'required|string|max:30',
            'description'=> 'required|string|max:255',
        ]);
        $post->update($request->all());

        return redirect()->route('post.edit', $post )->with('success', 'Post actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //eliminar le post
    }
}
