@extends('layouts.app')
@section('content')
<h1>This is Foods Page</h1>

@if(count($foods) > 0)
    <div class="food-list">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Count</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($foods as $food)
                <tr>
                    <td>{{ $food->id }}</td>
                    <td>{{ $food->name }}</td>
                    <td>{{ $food->count }}</td>
                    <td>{{ $food->description }}</td>
                    <td>
                        <a href="{{ route('foods.show', $food->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('foods.edit', $food->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>No food items found.</p>
@endif

<a href="{{ route('foods.create') }}" class="btn btn-success">Add New Food</a>
@endsection