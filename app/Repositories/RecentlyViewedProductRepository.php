<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\RecentlyViewedProduct;
use App\Models\User;

class RecentlyViewedProductRepository
{

    public function getRecentlyViewedProducts(User $user)
    {
        return RecentlyViewedProduct::where('user_id', $user->id)
            ->with('product')
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public function addProduct(Product $product, User $user): RecentlyViewedProduct
    {
        if ($this->isProductAlreadyViewed($product, $user)) {
            $this->removeProduct($product, $user);
        }
        $recentlyViewedProduct = new RecentlyViewedProduct();
        $recentlyViewedProduct->user_id = $user->id;
        $recentlyViewedProduct->product_id = $product->id;
        $recentlyViewedProduct->save();

        return $recentlyViewedProduct;
    }

    public function isProductAlreadyViewed(Product $product, User $user): bool
    {
        return RecentlyViewedProduct::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->exists();
    }

    public function removeProduct(Product $product, User $user)
    {
        RecentlyViewedProduct::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->delete();
    }
}
