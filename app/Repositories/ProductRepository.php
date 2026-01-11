<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function paginate(int $perPage = 4, array $filters):LengthAwarePaginator
    {
        return Product::query()
            ->when($filters['search'] ?? null, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search. '%');})
            ->when($filters['min_price'] ?? null, function ($query, $minPrice) {
                return $query->where('price', '>=', $minPrice);})
            ->when($filters['max_price'] ?? null, function ($query, $maxPrice) {
                return $query->where('price', '<=', $maxPrice);
        })
            ->when($filters['sort'] ?? null, function ($query, $sort) {
                [$column, $direction] = explode('_', $sort);

                $allowedColumns = ['price', 'name'];
                $allowedDirections = ['asc', 'desc'];

                if (in_array($column, $allowedColumns) && in_array($direction, $allowedDirections)) {
                    $query->orderBy($column, $direction);
                }
            })
            ->when($filters['categories'] ?? null, function ($query, $categories) {
                return $query->whereIn('category_id', $categories);
            })
            ->paginate($perPage)
            ->withQueryString();
    }
}
