<?php

namespace App\Http\Controllers;

use App\Services\CatalogService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct(
        private CatalogService  $catalogService,
        private CategoryService $categoryService
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

        return view('content.products', [
            'products' => $this->catalogService->getProducts(4, $filters),
            'categories' => $this->categoryService->getCategories(),
            'filters' => $filters,
        ]);
    }
}
