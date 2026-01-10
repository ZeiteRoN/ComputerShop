<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function paginate(int $perPage = 4, array $filters):LengthAwarePaginator
    {
        return Product::query()
            ->when($filters['search'] ?? null, function ($query, $filter) {
                return $query->where('name', 'like', '%' . $filter. '%');})
            ->when($filters['min_price'] ?? null, function ($query, $filter) {
                return $query->where('price', '>=', $filter);})
            ->when($filters['max_price'] ?? null, function ($query, $filter) {
                return $query->where('price', '<=', $filter);
        })
            ->when($filters['sort'] ?? null, function ($query, $filter) {
                switch ($filter) {
                    case 'price_desc':
                        return $query->orderBy('price', 'desc');
                    case 'name_asc':
                        return $query->orderBy('name', 'asc');
                    case 'name_desc':
                        return $query->orderBy('price', 'desc');
                        default:
                            return $query->orderBy('price', 'asc');
                }
            })
            ->paginate($perPage)
            ->withQueryString();
    }
}
