@extends('dashboard.layout')
@section('content')


    <main style="height: 100vh; background-color: rgb(4, 4, 57); display: flex; flex-direction: column; justify-content: center; align-items: center">
        <div style="padding: 25px; background-color: rgb(0, 0, 0); border-radius: 10px; width:350px">
            <h1 style="color:white">Detalle del Producto</h1>
            <div style="margin: 10px 0;">
                <a href={{ route('product.index') }} style="color:white">Regresar</a>
            <a href={{ route('product.edit', $product->id) }} style="color:white" >Editar</a>
            </div>
            <div style="background-color: aliceblue; padding: 10px">
                <h2>Id: {{ $product->id }}</h2>
                <h2>Name: {{ $product->name }}</h2>
                <h3>Price: {{ $product->price }}</h3>
                <p>Description: {{ $product->description }}</p>
                <p>Category: {{ $product->category->name }}</p>
                <p>Created: {{ $product->created_at }}</p>
            </div>
        </div>
    </main>

@endsection
