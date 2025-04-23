@extends('layouts.app')
@section('content')
    <h1>This is Foods Page</h1>

    @if (count($foods) > 0)
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
                    @foreach ($foods as $food)
                        <tr>
                            <td>{{ $food->id }}</td>
                            <td><a href="/foods/{{ $food->id }}">
                                {{-- Like a show detail --}}
                                    {{ $food->name }}
                            </td>
                            <td>{{ $food->count }}</td>
                            <td>{{ $food->description }}</td>
                            <td>
                                <a href="{{ route('foods.show', $food->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('foods.edit', $food->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="/foods/{{ $food->id }}" method="post" class="btn btn-danger btn-sm">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
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
