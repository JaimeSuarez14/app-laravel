@extends('dashboard.layout')
@section('content')


    <main style="height: 100vh; background-color: rgb(4, 4, 57); display: flex; flex-direction: column; justify-content: center; align-items: center">
        <div style="padding: 25px; background-color: rgb(0, 0, 0); border-radius: 10px">
            <h1 style="color:white">Detalle del Producto</h1>
            <div style="margin: 10px 0;">
                <a href={{ route('product.index') }} style="color:white">Regresar</a>
            <a href={{ route('post.edit', $postOne->id) }} style="color:white" >Edit</a>
            </div>
            <div style="background-color: aliceblue; padding: 10px">
                <h2>Id: {{ $postOne->id }}</h2>
                <h2>Title: {{ $postOne->title }}</h2>
                <h3>Content: {{ $postOne->content }}</h3>
                <p>Description: {{ $postOne->description }}</p>
                <p>Category: {{ $postOne->category->name }}</p>
                <p>Created: {{ $postOne->created_at }}</p>
            </div>
        </div>
    </main>

@endsection
