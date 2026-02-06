<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderItem;

class OrderRepository
{
    public function create(array $data): Order
    {
        return Order::create($data);
    }

    public function createOrderItem(array $data): OrderItem
    {
        return OrderItem::create($data);
    }
}
