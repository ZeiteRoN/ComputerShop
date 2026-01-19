@extends('layouts.app')

@section('content')
    <div>
        @if(!$cart || $cart->items->isEmpty())
            <p>Кошик порожній</p>
        @else
            @foreach($cart->items as $item)
                <h1>{{ $item->product->name }}</h1>
                <p>Ціна: {{ $item->product->price }}</p>
                <p>Кількість: {{ $item->quantity }}</p>
                <p>Сума: {{ $item->product->price * $item->quantity }}</p>
            @endforeach
            <h2>Загальна ціна: {{ $cartService->getCartTotalPrice($cart) }}</h2>
        @endif
    </div>
@endsection
