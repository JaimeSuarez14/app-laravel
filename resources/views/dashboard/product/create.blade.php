@extends('dashboard.layout')

@section('content')
<section style="display: flex; justify-content: center; align-items: center">
    <div style="padding: 25px; background-color: rgb(0, 0, 0); border-radius: 10px">
    <h1 style="color:white">Create del Product</h1>
    <a href={{ route('product.index')}} style="color:white">Cancelar</a>

     @if(session('success'))
        <div style="color:white; padding: 2px; background-color: green; border-radius: 5px; margin: 5px 0">{{ session('success') }}</div>
    @endif

    <form action="{{ route('product.store') }}" method="POST" style="padding:20px 0">
        @csrf
        <input type="hidden" name="id" value="" id="">

        <div style="display: flex; flex-direction: column">
            <label for="" style="color:aliceblue">Name:</label>
            <input type="text" name="name" value="" id="" required>
        </div>
        <div style="display: flex; flex-direction: column">
            <label for="" style="color:aliceblue">Price:</label>
            <input type="number" name="price" value="" id="" required>
        </div>
        <div>
            <select name="category_id" id="" style="padding: 5px; width:100%; margin:10px 0;" required>
                <option value="" disabled selected>Selecciona una categoria</option>
                @foreach ($categories as $name => $id)
                    <option value="{{  old('id', $id) }}">{{ $name}}</option>
                @endforeach
            </select>
        </div>
        <div style="display: flex; flex-direction: column">
            <label for="" style="color:aliceblue">Description:</label>
            <textarea type="text" name="description"  id="" required></textarea>
        </div>
        <button style="padding: 5px; width: 100%; margin-top: 5px; background-color: green; color:white;" type="submit">Crear</button>
    </form>
    </div>
    </section>
@endsection
