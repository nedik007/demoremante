<div class="productItem">
    <div class="text-center">
        <a href="{{route('product.detail', ['Product' => $product])}}"><img src="{{route('product.image', ['productId' => $product->id])}}"/></a>
    </div>
    <a href="{{route('product.detail', ['Product' => $product])}}"><h2 class="text-center">{{$product->title}}</h2></a>
    <p class="text-center price">{{ number_format($product->price, 0, ',', ' ')}} Kč</p>
</div>
