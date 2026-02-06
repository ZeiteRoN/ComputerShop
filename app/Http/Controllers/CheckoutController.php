<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct(
        private OrderService $orderService
    ) {}

    public function create()
    {
        return view('checkout.form');
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
