@extends('_layout.app')

@section('title', $product->title)

@section('content')

    <h1>{{$product->title}}</h1>

    <h2>Výrobce: {{  $product->brand ? $product->brand->title : '' }}</h2>
    <h3>Kod: {{  $product->code }}</h3>

    <div>{{$product->description}}</div>

    <div class="text-center">
        <img src="{{route('product.image', ['productId' => $product->id])}}"/>
    </div>

    <p class="text-center price">{{ number_format($product->price, 0, ',', ' ')}} Kč</p>

    <div class="text-center">
        <form method="post" action="{{route('basket.addProduct', ['Product' => $product])}}">
            @csrf
            <input type="number" min="1" max="100" size="1" value="1" name="count"/>
            <input type="submit" class="btn btn-danger" value="Koupit"/>
        </form>
    </div>

@endsection
