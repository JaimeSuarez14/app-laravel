<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Producto Editar</title>
</head>
<body style="box-sizing: border-box; padding:0; margin:0">
    <main style="height: 100vh; background-color: rgb(4, 4, 57); display: flex; flex-direction: column; justify-content: center; align-items: center">
    <div style="padding: 25px; background-color: rgb(0, 0, 0); border-radius: 10px">
    <h1 style="color:white">Editar Producto</h1>
    <a href={{route('product.index')}} style="color:white">Cancelar</a>

     @if(session('success'))
        <div style="color:white; padding: 2px; background-color: green; border-radius: 5px; margin: 5px 0">{{ session('success') }}</div>
    @endif

    <form action="{{ route('post.update', $product->id ) }}" method="POST" style="padding:20px 0">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value={{ old('id', $product->id) }} id="">

        <div style="display: flex; flex-direction: column">
            <label for="" style="color:aliceblue">Name:</label>
            <input type="text" name="name" value="{{ old('title', $product->name) }}" id="">
        </div>
        <div style="display: flex; flex-direction: column">
            <label for="" style="color:aliceblue">Price:</label>
            <input type="number" name="price" value="{{  old( 'price', $product->price ) }}" id="">
        </div>
        <div>
            <select name="category_id" id="" style="padding: 5px; width:100%; margin:10px 0;" required>
                <option value="" disabled >Selecciona una categoria</option>
                @foreach ($categories as $name => $id)
                    <option value="{{  old('id', $id) }}"
                        {{ $id == $product->category_id ? "selected" :"" }}
                        >{{ $name}}</option>
                @endforeach
            </select>
        </div>
        <div style="display: flex; flex-direction: column">
            <label for="" style="color:aliceblue">Description:</label>
            <textarea type="text" name="description"  id="">{{ old('description', $product->description) }}</textarea>
        </div>
        <button style="padding: 5px; width: 100%; margin-top: 5px;" type="submit">Actualizar</button>
    </form>
    </div>
    </main>
</body>
</html>
