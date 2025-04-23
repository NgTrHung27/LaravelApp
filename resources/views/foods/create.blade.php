@extends('layouts.app')
@section('content')
    <h1>This is Foods Create Page</h1>
    <form action="/foods" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- The key is generate at every session start --}}
        {{-- only apply to non-read routes --}}
        {{-- If sơm hacker access to site form hist/her site --}}
        <input class="form-control" type="text" name='name' placeholder="Enter food's name">
        <input class="form-control" type="text" name='description' placeholder="Enter food's description">
        <input class="form-control" type="text" name='count' placeholder="Enter food's count">
        <input class="form-control" type="file" name='image'>

        <div>
            <label> Chose a categories: </label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary" type="submit">
            Submit
        </button>
    </form>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p class="text-danger">
                    {{ $error }}</p>
            @endforeach
        </div>
    @endif
@endsection
