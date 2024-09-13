@extends('layouts.app')
@section('content')
<h1>PageController.index, w share Header + Footer</h1>
{{-- {{ print_r(URL('')) }} --}}
<img src="{{ URL('images/pen.png') }}" width="100" height="100" alt="">
@endsection
