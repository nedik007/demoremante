@extends('_layout.app')

@section('title', $product->title)

@section('content')

    <h1>Nákupní košík</h1>

    <p class="alert alert-danger">Být tohle normální spuštěný eshop, tak by jste právě měl v Košíku výřobek: {{$product->title}} v počtu: {{$count}} kusů.</p>

@endsection
