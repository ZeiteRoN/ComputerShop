<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\User;

class CartRepository
{
    public function getCartByUser(User $user): Cart
    {
        return Cart::where('user_id', $user->id);
    }

    public function createUserCart(User $user): Cart
    {
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->save();
        return $cart;
    }
}
