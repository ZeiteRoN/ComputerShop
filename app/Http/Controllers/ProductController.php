<?php

namespace App\Http\Controllers;

use App\Services\CatalogService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct(private CatalogService $service){
    }
    public function index(Request $request)
    {
        $filters = [
            'min_price' => $request->input('min_price'),
            'max_price' => $request->input('max_price'),
            'search' => $request->input('search'),
            'sort' => $request->input('sort'),
        ];

        return view('products', [
            'products' => $this->service->getProducts(4, $filters)
        ]);
    }
}
