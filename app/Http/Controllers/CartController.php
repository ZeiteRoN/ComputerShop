<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function __construct(
        private CartService $cartService,
    ){}

    public function addProduct(Product $product)
    {
        $user = Auth::user();

        dd($user, $product);
    }

    public function showCart()
    {
        $user = Auth::user();
        $cart = $this->cartService->getUserCart($user);
        return view('content.cart.show', compact('cart'));
    }
}
