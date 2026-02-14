@extends('maestro')

@section('content')

    <h1>Contact 1</h1>
    <h2>Lista de Posts</h2>
    <ol>
    @foreach ($posts as $item)
        <li>{{$item}}</li>
    @endforeach
    </ol>

@endsection
