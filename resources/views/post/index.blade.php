<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body style="box-sizing: border-box; padding:0; margin:0">
    <main style="height: 100vh; background-color: rgb(4, 4, 57); display: flex; flex-direction: column; justify-content: center; align-items: center; color:white;">
    <div style="padding: 25px; background-color: rgb(0, 0, 0); border-radius: 10px">
    <h1 style="">Lista de Posts Registrados</h1>
     @if(session('success'))
        <div style="color:white; padding: 2px; background-color: green; border-radius: 5px; margin: 5px 0">{{ session('success') }}</div>
    @endif
    <div style="padding-bottom: 15px;">
        <span>Crear un nuevo Post </span> <a href={{ route('post.create')}}> <button>Crear</button></a>
    </div>
    <table border="1" style="background-color: rgb(152, 237, 237); color:black">
        <thead>
            <tr style="background-color: aqua">
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Description</th>
                <th>Created_at</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item['title'] }}</td>
                <td>{{ $item['content'] }}</td>
                <td>{{ $item['description'] }}</td>
                <td>{{ $item['created_at'] }}</td>
                <td>
                    <a href={{ route('post.show', $item->id)  }}><button>View</button></a>
                    <a href={{ route('post.edit', $item->id) }}><button>Edit</button></a>
                    <form action="{{ route('post.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    </div>
    </main>
</body>
</html>
