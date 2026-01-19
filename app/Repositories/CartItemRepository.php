<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartItemRepository
{
    public function getCartItemByCartProduct(Cart $cart, Product $product)
    {
        return CartItem::where(['cart_id' => $cart->id, 'product_id' => $product->id]);
    }

    public function createCartItem(Cart $cart, Product $product): CartItem
    {
        $cartItem = new CartItem();
        $cartItem->cart_id = $cart->id;
        $cartItem->product_id = $product->id;
        $cartItem->quantity = 1;
        $cartItem->save();
        return $cartItem;
    }
}
