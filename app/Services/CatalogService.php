<?php

namespace App\Services;

use App\Models\Product;
use App\Models\RecentlyViewedProduct;
use App\Models\User;
use App\Repositories\ProductRepository;
use App\Repositories\RecentlyViewedProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CatalogService
{
    public function __construct(
        private ProductRepository $productRepository,
        private RecentlyViewedProductRepository $recentlyViewedProductRepository
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

    public function addProductToRecentlyViewed(Product $product, User $user): RecentlyViewedProduct
    {
        return $this->recentlyViewedProductRepository->addProduct($product, $user);
    }

    public function getRecentlyViewedProducts(?User $user): ?Collection
    {
        if (!$user) {
            return collect();
        }

        return $this->recentlyViewedProductRepository->getRecentlyViewedProducts($user);
    }

}
