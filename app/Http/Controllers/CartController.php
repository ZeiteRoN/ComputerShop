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

        $this->cartService->addProductToCart($user, $product);
        return redirect('cart');
    }

    public function showCart()
    {
        $user = Auth::user();
        $cart = $this->cartService->getUserCart($user);
        $totalPrice = $this->cartService->getCartTotalPrice($cart);
        return view('content.cart.show', compact('cart', 'totalPrice'));
    }
}
