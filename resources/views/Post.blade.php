<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main style="height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center">
    <div style="padding: 10px; background-color: rgb(239, 228, 228)">
    <h1>Lista de Posts Registrados</h1>
    <table border="1">
        <thead>
            <tr>
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
                    <button>View</button>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    </div>
    </main>
</body>
</html>
