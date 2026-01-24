@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-2">
        @if(!$cart || $cart->items->isEmpty())
            <p>Кошик порожній</p>
        @else
            @foreach($cart->items as $item)
                @include('components.cart-item-card', $item)
            @endforeach
        @endif
        <div>
            <h1>Total: {{$totalPrice}}</h1>
        </div>
    </div>
@endsection
