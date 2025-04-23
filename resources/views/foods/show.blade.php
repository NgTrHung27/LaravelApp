@extends('layouts.app')
@section('content')
    <h1>This is Show Food Information</h1>
    <h3>Name: {{ $food->name }}</h3>
    <img src="{{ asset('images/' . $food->image_path) }}" alt="">
    <h3>Count: {{ $food->count }}</h3>
    <h3>Description: {{ $food->description }}</h3>
    <h3>Category's name: {{ $food->category->name }}</h3>
@endsection
