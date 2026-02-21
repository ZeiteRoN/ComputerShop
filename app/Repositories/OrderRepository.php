<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    public function create(array $data): Order
    {
        return Order::create($data);
    }

    public function getUserOrders(User $user): ?Collection
    {
        return Order::where('user_id', $user->id)->get();
    }
}
