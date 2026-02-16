<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index', compact('products') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');//el orden es importante valor - clave
        return view('dashboard.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'category_id' => trim($request->category_id),
        ]);

        $request->validate([
            'name'=> 'required|string|unique:products|max:30',
            'price' => 'required|min:1',
            'category_id'=> 'required|string|max:30',
            'description'=> 'required|string|max:255',
        ]);

        Product::create($request->all());

        return redirect()->route('product.create')->with('success', 'Product creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('dashboard.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck( 'name' , 'id' );
        return view('dashboard.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->merge([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'category_id' => trim($request->category_id),
        ]);

        $request->validate([
            'name'=> 'required|string|unique:products|max:30',
            'price' => 'required|min:1',
            'category_id'=> 'required|string|max:30',
            'description'=> 'required|string|max:255',
        ]);

        $product->update( $request->all() );

        return to_route('product.edit', compact('product') )->with('success', 'Product actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
