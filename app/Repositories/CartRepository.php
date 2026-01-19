<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class CartRepository
{
    public function getCartByUser(User $user): Cart|null
    {
        return Cart::where('user_id', $user->id)->first();
    }

    public function createUserCart(User $user): Cart
    {

        $cart = Cart::make([
            'user_id' => $user->id,
        ]);
        $cart->save();
        return $cart;
    }

    public function getCartItems(Cart $cart): Collection
    {
        return $cart->items()->with('product')->get();
    }
}
