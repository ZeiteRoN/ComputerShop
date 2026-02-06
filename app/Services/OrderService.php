<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class OrderService
{
    public function __construct(
        protected OrderRepository $orderRepository,
        protected CartService $cartService
    ) {}

    public function checkout(User $user, string $address, string $phone): Order
    {
        $cart = $this->cartService->getCartWithItems($user);

        if ($cart->items->isEmpty()) {
            throw new \Exception('Cart is empty');
        }

        return DB::transaction(function () use ($user, $cart, $address, $phone) {

            $total = $cart->items->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            $order = $this->orderRepository->create([
                'user_id' => $user->id,
                'delivery_address' => $address,
                'phone_number' => $phone,
                'total_price' => $total,
                'status' => 'pending'
            ]);

            foreach ($cart->items as $item) {
                $this->orderRepository->createOrderItem([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'string_product_name' => $item->product_name,
                    'decimal_price' => $item->price,
                    'integer_quantity' => $item->quantity,
                ]);
            }

            $cart->items()->delete();

            return $order;
        });
    }
}

