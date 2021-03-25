@extends('_layout.admin')

@section('content')

    <a class="btn btn-success" href="{{route('admin.newProduct')}}">Vytvořit nový produkt</a>

    <p>Editovat produkty:</p>
    <ul>
        @foreach($products as $product)
            <li>
                <a href="{{route('admin.product', ['Product' => $product])}}">{{$product->title}}</a> - Cena: {{$product->price}} Kč
            </li>
        @endforeach
    </ul>

@endsection
