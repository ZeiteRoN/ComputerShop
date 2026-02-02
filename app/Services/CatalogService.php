<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CatalogService
{
    public function __construct(
        private ProductRepository $productRepository
    ){}

    public function getProducts(int $perPage, array $filters):LengthAwarePaginator
    {
        return $this->productRepository->paginate($perPage, $filters);
    }

    public function getFamiliarProductsByCategory(Product $product)
    {
        return $this->productRepository->getFamiliarProductsByCategory($product);
    }

    public function getProductDetails(Product $product): Collection
    {
        $data = cache()->remember('products_detailed', 3600, function () {
            $json = file_get_contents(resource_path('jsons/products_detailed.json'));
            return json_decode($json, true);
        });

        return collect($data[$product->id] ?? []);
    }


}
