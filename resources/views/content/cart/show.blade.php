@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-2">
        @if(!$cart || $cart->items->isEmpty())
            <p>Кошик порожній</p>
        @else
            @foreach($cart->items as $item)
                @include('components.cart-item-card', ['item' => $item])
            @endforeach
            <div>
                <h1>Total: {{$totalPrice}}</h1>
            </div>
            <form class="flex justify-center" action="">
                <button type="submit" class="bg-blue-500 rounded-xl max-w-36 p-2">
                    Оформити
                </button>
            </form>
        @endif
    </div>
@endsection
