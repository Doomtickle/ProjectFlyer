@extends('layout')

@section('content')

<h1>{{ $flyer->street }}</h1>
<hr>
    <div class="description">
        Description: {{ $flyer->description }}
    </div>
    <div class="price">
       Price: ${{ number_format($flyer->price) }}
    </div>
<hr>
@stop