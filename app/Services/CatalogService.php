<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CatalogService
{
    public function __construct(
        private ProductRepository $productRepository
    ){}

    public function getProducts(int $perPage, array $filters):LengthAwarePaginator
    {
        return $this->productRepository->paginate($perPage, $filters);
    }
}
