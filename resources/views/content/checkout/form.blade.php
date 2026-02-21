@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-8">

        <h1 class="text-2xl font-bold mb-6">Checkout</h1>
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-gray-100 p-4 rounded mb-6">
            <h2 class="font-semibold mb-2">Order Summary</h2>

            @foreach($cart->items as $item)
                <div class="flex justify-between">
                <span>
                    {{ $item->product->name }}
                    (x{{ $item->quantity }})
                </span>
                    <span>
                    {{ $item->product->price * $item->quantity }} $
                </span>
                </div>
            @endforeach

            <div class="flex justify-between font-bold mt-4 border-t pt-2">
                <span>Total:</span>
                <span>{{ $total }} $</span>
            </div>
        </div>

        <form method="POST" action="{{ route('checkout.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium">Delivery Address</label>
                <input type="text" name="delivery_address" value="{{ old('delivery_address') }}" class="w-full border rounded p-2"
                    required
                >
            </div>
            <div>
                <label class="block mb-1 font-medium">Phone Number</label>
                <input
                    type="text"
                    name="phone_number"
                    value="{{ old('phone_number') }}"
                    class="w-full border rounded p-2"
                    required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Confirm Order
            </button>
        </form>

    </div>
@endsection
