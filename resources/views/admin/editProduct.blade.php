@extends('_layout.admin')

@section('content')

    <p>Editovat produkt:</p>

    <form action="{{route('admin.saveProduct')}}" method="post" enctype="multipart/form-data">
        @csrf

        @if($product)
            <input type="hidden" name="productId" value="{{$product->id}}"/>
        @endif

        <table class="table">
            <tr>
                <td>Název</td>
                <td><input type="text" name="title" value="{{old('title', $product->title)}}"/></td>
            </tr>
            <tr>
                <td>Kod</td>
                <td><input type="text" name="code" value="{{old('code', $product->code)}}"/></td>
            </tr>
            <tr>
                <td>Značka</td>
                <td><input type="text" name="brand" value="{{old('brand', @$product->brand->title)}}"/></td>
            </tr>
            <tr>
                <td>Popis</td>
                <td><textarea name="description">{{old('description', $product->description)}}</textarea></td>
            </tr>
            <tr>
                <td>Kategorie</td>
                <td>
                    <select name="categoryId">
                        @foreach($categories as $category)
                            <option @if($product->category->first()->id == $category->id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Cena</td>
                <td><input type="number" name="price" value="{{old('price', $product->price)}}"/></td>
            </tr>
            <tr>
                <td>Obrazek (neni nijak kontrolovano, tak opatrne)</td>
                <td><input type="file" name="file"/></td>
            </tr>
        </table>


        <input type="submit" value="Uložit" class="btn btn-success"/>

    </form>


@endsection
