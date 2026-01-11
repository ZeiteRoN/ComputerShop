<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    function __construct(
        private CategoryRepository $repository){}
    public function getCategories():Collection
    {
        return $this->repository->getCategories();
    }
}
