@extends('_layout.app')

@section('title', 'Fulltext - '.$q)

@section('content')

    <h1>Vyhledávám frázi "{{$q}}"</h1>

    @include('components.sort', ['routeName' => 'fulltext', 'params' => ['q' => $q]])

    <div class="alert alert-primary">Nyní to vyhledává jednoduše pomocí LIKE, pro produkční použití se nabízí například využití Elastic Search.</div>

    @if($productPaginator->count() > 0)
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
    @else
        <div class="alert alert-danger">Nic nenalezeno</div>
    @endif

@endsection


