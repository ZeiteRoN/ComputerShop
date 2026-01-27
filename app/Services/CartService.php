<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use App\Repositories\CartItemRepository;
use App\Repositories\CartRepository;

class CartService
{

    function __construct(
        public CartRepository $cartRepository,
        public CartItemRepository $cartItemRepository,
    ){}
    public function addProductToCart(User $user, Product $product): CartItem
    {
        $cart = $this->cartRepository->getCartByUser($user);
        if(!$cart){
            $cart = $this->cartRepository->createUserCart($user);
        }

        $cartItem = $this->cartItemRepository->getCartItemByCartProduct($cart, $product);
        if(!$cartItem){
            $cartItem =  $this->cartItemRepository->createCartItem($cart, $product);
        } else {
            $this->cartItemRepository->increaseQuantity($cartItem);
        }
        return $cartItem;
    }

    public function getOrCreateUserCart(User $user): ?Cart
    {
        if(!$this->cartRepository->getCartByUser($user)) {
            return$this->cartRepository->createUserCart($user);
        }
        else {
            return $this->cartRepository->getCartByUser($user);
        }
    }

    public function getCartWithItems(User $user): Cart
    {
        $cart = $this->cartRepository->getCartByUser($user);
        if(!$cart){
            $cart = $this->cartRepository->createUserCart($user);
        }
        $cart->items = $this->cartRepository->getCartItems($cart);
        return $cart;
    }

    public function getCartTotalPrice(Cart $cart): float
    {
        $totalPrice = 0;

        foreach ($cart->items as $item) {
            $totalPrice += $item->product->price * $item->quantity;
        }
        return $totalPrice;
    }

    public function increaseQuantity(CartItem $cartItem): void
    {
        $this->cartItemRepository->increaseQuantity($cartItem);
    }
    public function decreaseQuantity(CartItem $cartItem): void
    {
        $this->cartItemRepository->decreaseQuantity($cartItem);
    }
}
