<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{


    public function index(Product $product)
    {
        return view('product', [
            'product' => $product
            ]);
    }


    public function image($productId)
    {
        if (Storage::disk('productImage')->exists($productId)) {
            $content = Storage::disk('productImage')->get($productId);
            Storage::disk('publicProductImages')->put($productId.'.jpg', $content);

            $path = Storage::disk('publicProductImages')->path($productId.'.jpg');

            return response()->file($path, ['content-type:image/jpg']);
        }
        exit();
    }
}
