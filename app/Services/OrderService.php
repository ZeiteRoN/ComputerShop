<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;
use App\Repositories\OrderRepository;
use DomainException;
use Illuminate\Database\Eloquent\Collection;
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

        if (!$cart || $cart->items->isEmpty()) {
            throw new DomainException('Cart is empty');
        }

        return DB::transaction(function () use ($user, $cart, $address, $phone) {

            $total = 0;

            $order = Order::create([
                'user_id' => $user->id,
                'delivery_address' => $address,
                'phone_number' => $phone,
                'total_price' => 0,
                'status' => 'pending',
            ]);

            foreach ($cart->items as $item) {

                $price = $item->product->price;
                $subtotal = $price * $item->quantity;

                $total += $subtotal;

                $order->items()->create([
                    'order_id' => $order->id,
                    'product_id' => $item->product->id,
                    'product_name' => $item->product->name,
                    'price' => $price,
                    'quantity' => $item->quantity,
                    'subtotal' => $subtotal,
                ]);
            }

            $order->update(['total_price' => $total]);

            $cart->items()->delete();

            return $order;
        });
    }

    public function getUserOrders(User $user): ?Collection
    {
        return $this->orderRepository->getUserOrders($user);
    }
}

