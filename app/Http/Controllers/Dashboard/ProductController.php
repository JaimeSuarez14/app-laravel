<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Validation\Rule;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id'); //el orden es importante valor - clave
        return view('dashboard.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {

            // Limpiar solo textos
            /*$request->merge([
                'name' => trim($request->name),
                'description' => trim($request->description),
            ]);*/

            // Validación
           /* $validated = $request->validate([
                'name'        => 'required|string|max:30|unique:products,name',
                'price'       => 'required|numeric|min:1',
                'category_id' => 'required|integer|exists:categories,id',
                'description' => 'required|string|max:255',
            ]);*/

            // Guardar
            $product = Product::create($request->validated());

            return to_route('product.create')
                ->with('success', 'Producto creado correctamente');
        } catch (QueryException $e) {

            return back()
                ->withInput()
                ->with('error', 'Error en la base de datos: ' . $e->getMessage());
        } catch (Exception $e) {

            return back()
                ->withInput()
                ->with('error', 'Ocurrió un error inesperado');
        }
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
        $categories = Category::pluck('name', 'id');
        return view('dashboard.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Limpiar solo textos
        $request->merge([
            'name' => trim($request->name),
            'description' => trim($request->description),
        ]);

        // Validación
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:30',
                Rule::unique('products', 'name')->ignore($product->id),
            ],
            'price'       => 'required|numeric|min:1',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'required|string|max:255',
        ]);

        $product->update($validated);

        return to_route('product.edit', $product)
            ->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
