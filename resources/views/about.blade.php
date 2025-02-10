{{-- Kế thừa từ applayout --}}
@extends('layouts.app')
@section('content')
<h1>AboutPage, w share header + foooter</h1>
{{
$x = 10 }}
@if($x > 2)
    <h3> x is greater than 2</h3>
@elseif($x < 10)
    <h3>x is less than 10</h3>
@else
    <h3>All condition </h3>
@endif
{{-- unless = "if not" --}}
{{-- @unless(empty($name))
    <h3>Name is not empty, unless</h3>
@endunless
@if(!empty($name))
    <h3>Name is not empty, if</h3>
@endif --}}

{{-- @empty(!$name)
    <h3>Name is not empty, empty check</h3>
@endempty

@empty($age)
    <h3>Age is empty</h3>
@endempty

@isset($name)
    <h3>Name has been set</h3>
@endisset --}}
{{--
@switch($name)
    @case('Henry')
        <h3>This is Henry</h3>
        @break
        @case('Hung')
        <h3>This is TrungHung</h3>
        @break
    @default
        <h3>No one</h3>
@endswitch --}}


{{-- @for($i = 0; $i < 5; $i++)
    <h2>i = {{ $i }}</h2>
@endfor

@foreach ($names as $eachName)
    <h3>eachName: {{ $eachName }}</h3>
@endforeach

@forelse ($names as $eachName)
    <h3>eachName: {{ $eachName }}</h3>
@empty
@endforelse --}}

{{-- {{ $i = 0 }}
@while ($i < 10)
    <h3>i = {{ $i }}</h3>
    {{ $i++; }}
@endwhile --}}
@endsection
