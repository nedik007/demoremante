@extends('_layout.app')

@section('title', $category->title)

@section('content')

    <h1>Kategore {{$category->title}}</h1>

    @include('components.categories')

    @include('components.sort', ['routeName' => 'category', 'params' => ['Category' => $category]])

    <div class="products">
        <ul>
            @foreach($productPaginator as $product)
                @include('productOneItem', ['product' => $product])
            @endforeach
        </ul>

        <div class="paginator">
            {{$productPaginator->links()}}
        </div>
    </div>

    <a href="{{request()->fullUrlWithQuery(['csv' => 1])}}" class="btn btn-warning">Export do CSV</a>

@endsection


