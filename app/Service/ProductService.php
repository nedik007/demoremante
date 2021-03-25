<?php

namespace App\Service;

class ProductService
{
    public function saveImage($product, $content)
    {
        $file = $product->id;

        \Storage::disk('productImage')->put($file, $content);
        \Storage::disk('publicProductImages')->delete($file.'.jpg');

    }
}
