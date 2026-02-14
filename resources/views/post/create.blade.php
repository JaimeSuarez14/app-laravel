<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts Edit</title>
</head>
<body style="box-sizing: border-box; padding:0; margin:0">
    <main style="height: 100vh; background-color: rgb(4, 4, 57); display: flex; flex-direction: column; justify-content: center; align-items: center">
    <div style="padding: 25px; background-color: rgb(0, 0, 0); border-radius: 10px">
    <h1 style="color:white">Create del Post</h1>
    <a href="/post" style="color:white">Cancelar</a>

     @if(session('success'))
        <div style="color:white; padding: 2px; background-color: green; border-radius: 5px; margin: 5px 0">{{ session('success') }}</div>
    @endif

    <form action="{{ route('post.store') }}" method="POST" style="padding:20px 0">
        @csrf
        <input type="hidden" name="id" value="" id="">

        <div style="display: flex; flex-direction: column">
            <label for="" style="color:aliceblue">Title:</label>
            <input type="text" name="title" value="" id="">
        </div>
        <div style="display: flex; flex-direction: column">
            <label for="" style="color:aliceblue">Content:</label>
            <input type="text" name="content" value="" id="">
        </div>
        <div style="display: flex; flex-direction: column">
            <label for="" style="color:aliceblue">Description:</label>
            <textarea type="text" name="description"  id=""></textarea>
        </div>
        <button style="padding: 5px; width: 100%; margin-top: 5px; background-color: green; color:white;" type="submit">Crear</button>
    </form>
    </div>
    </main>
</body>
</html>
