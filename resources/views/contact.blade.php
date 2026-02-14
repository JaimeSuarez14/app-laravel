@extends('maestro')

@section('content')

    <h1>Contact 1</h1>
    <h2>{{ $name}}</h2>
    @if ($name == "Jaime")
        Tu nombre es jaime
    @else
        Tu nombre no es Jaime
    @endif
@endsection
