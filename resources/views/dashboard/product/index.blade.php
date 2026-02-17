@extends('dashboard.layout')

@section('content')

<main style="height: 100vh; background-color: rgb(4, 4, 57); display: flex; flex-direction: column; justify-content: center; align-items: center; color:white;">
    <div style="padding: 25px; background-color: rgb(0, 0, 0); border-radius: 10px; width:650px;">
    <h1 >Lista de Productos Registrados</h1>
     @if(session('success'))
        <div style="color:white; padding: 2px; background-color: green; border-radius: 5px; margin: 5px 0">{{ session('success') }}</div>
    @endif
    <div style="padding-bottom: 15px;">
        <span>Crear un nuevo Producto </span> <a href={{ route('product.create')}}> <button>Crear</button></a>
    </div>
    <table border="1" style="background-color: rgb(152, 237, 237); color:black; width:100%">
        <thead>
            <tr style="background-color: aqua">
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @if ($products->count() > 0)
                @foreach ($products as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['description'] }}</td>
                <td>
                    <a href={{ route('product.show', $item->id)  }}><button>View</button></a>
                    <a href={{ route('product.edit', $item->id) }}><button>Edit</button></a>
                    <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach

            @else
                <tr>
                    <td style="text-align: center; padding: 10px 0;" colspan="4">No hay productos registrados</td>
                </tr>
            @endif
        </tbody>

    </table>
    <div style="width:150px; height:25px;">{{ $products->links() }}</div>
    </div>
    </main>

@endsection
