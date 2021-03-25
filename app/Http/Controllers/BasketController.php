<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{


    public function addProduct(Product $product, Request $request)
    {

        return view('basket', [
            'product' => $product,
            'count' => $request->get('count', 1)
            ]);
    }

}
