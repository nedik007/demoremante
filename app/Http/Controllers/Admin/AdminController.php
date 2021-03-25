<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductSaveRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Service\ProductService;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index', [
            'products' => Product::orderBy('title')->get()
        ]);
    }


    public function editProduct(Product $product)
    {
        return view('admin.editProduct', [
            'product' => $product,
            'categories' => Category::get(),
        ]);
    }

    public function createProduct()
    {
        return view('admin.editProduct', [
            'product' => new Product,
            'categories' => Category::get(),
        ]);
    }


    public function saveProduct(ProductSaveRequest $request)
    {
        $productId = $request->get('productId');
        if ($productId) {
            $product = Product::find($productId);
            $product->update($request->all());
        }
        if (!isset($product) || !$product) {
            $product = Product::create($request->all());
        }


        if (!$brand = Brand::where('title', $request->get('brand'))->first()) {
            $brand = Brand::create(['title' => $request->get('brand')]);
        }
        $product->brand_id = $brand->id;
        $product->save();

        ProductCategory::where('product_id', $product->id)->delete();
        $product->category()->save(Category::find($request->get('categoryId')));


        $file = $request->file('file');
        if ($file) {
            $service = app(ProductService::class);
            $service->saveImage($product, $file->get());
        }



        return redirect(route('admin.home'))->with('success', 'Produkt uložen');
    }

}
