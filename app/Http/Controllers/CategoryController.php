<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index(Category $category, ProductRepository $repository, Request $request)
    {
        $repository->applyCategory($category);

        $orderBy = $request->get('orderBy', 'title');
        $desc = $request->get('orderByDesc', 'asc');
        $repository->setOrderBy($orderBy, $desc);

        if ($request->get('csv')) {
            return $this->responseCsv($repository->get()); // no pagination or limit
        }

        return view('category', [
            'category' => $category,
            'productPaginator' => $repository->paginate(6)->withQueryString(),
            'orderBy' => $orderBy,
            'orderByDesc' => $desc
            ]);
    }

    private function responseCsv($products)
    {
        $tmpFile = tempnam(sys_get_temp_dir(), 'csv');
        $fp = fopen($tmpFile, 'w');
        foreach ($products as $product) {
            $row = [];
            $row[] = $product->title;
            $row[] = $product->code;
            $row[] = @$product->brand->title;
            $row[] = $product->price;
            fputcsv($fp, $row);
        }
        fclose($fp);

        return response()->file($tmpFile, ['content-type' => 'text/csv', 'Content-Disposition' => 'attachment; filename=products.csv', 'Pragma' => 'no-cache', 'Expires' => '0']);
    }
}
