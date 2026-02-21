<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct(
        private OrderService $orderService
    ) {}

    public function show()
    {
        $orders = $this->orderService->getUserOrders(auth()->user());
        return view('content.orders.show', compact('orders'));
    }

    public function create()
    {
        $cart = auth()->user()->cart;
        $total = $cart->items->sum('price');
        return view('content.checkout.form', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'delivery_address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
        ]);

        try {
            $order = $this->orderService->checkout(
                auth()->user(),
                $request->delivery_address,
                $request->phone_number
            );
        } catch (\DomainException $e) {
            return back()->withErrors($e->getMessage());
        }

        return redirect()->route('orders.show', $order);
    }
}
