<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CatalogService;
use App\Services\CategoryService;
use App\Constants\Categories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct(
        private CatalogService  $catalogService,
    ){}
    public function index(Request $request)
    {
        $filters = [
            'min_price' => $request->input('min_price'),
            'max_price' => $request->input('max_price'),
            'search' => $request->input('search'),
            'sort' => $request->input('sort'),
            'categories' => $request->input('categories'),
        ];

        return view('content.products.products', [
            'products' => $this->catalogService->getProducts(4, $filters),
            'categories' => Categories::WITH_TEXT,
            'filters' => $filters,
        ]);
    }

    public function show(Product $product)
    {
        return view('content.products.show', compact('product'));
    }
}
