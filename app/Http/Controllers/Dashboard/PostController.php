<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View

    {

        $posts = Post::all();
        //dd($posts);
        return  view("post.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        //dd($categories[1]->posts);
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->merge([
            'title' => trim($request->title),
            'content' => trim($request->content),
            'description' => trim($request->description),
            'category_id' => trim($request->category_id),
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
        $post->category_id = $request->category_id;

        $post->save();

        return redirect()->route('post.create')->with('success', 'Post creado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        $id = $post->id;
        $postOne = Post::find($id);
        //dd($postOne->category->name);

        return view("post.show", compact('postOne'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        $id = $post->id;
        $postOne = Post::find($id);
        $categories =  Category::all();
        return view("post.edit", compact('postOne', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post):RedirectResponse
    {
        $request->validate([
            'title'=> 'required|string|max:30',
            'content'=> 'required|string|max:30',
            'category_id'=> 'required|string|max:30',
            'description'=> 'required|string|max:255',
        ]);
        //dd( $request->all());
        $post->update($request->all());

        return redirect()->route('post.edit', $post )->with('success', 'Post actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $postDelete = Post::find($post->id);
        $postDelete->delete();
        return redirect()->route('post.index')->with('success', 'Post eliminado correctamente');
    }
}
