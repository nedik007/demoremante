<?php

namespace App\Http\Controllers;

use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class FulltextController extends Controller
{
    public function index(ProductRepository $repository, Request $request)
    {
        $repository->applyFulltext($request->get('q'));

        $orderBy = $request->get('orderBy', 'title');
        $desc = $request->get('orderByDesc', 'asc');
        $repository->setOrderBy($orderBy, $desc);

        return view('fulltext', [
            'productPaginator' => $repository->paginate(6)->withQueryString(),
            'orderBy' => $orderBy,
            'orderByDesc' => $desc,
            'q' => $request->get('q')
        ]);
    }

}
