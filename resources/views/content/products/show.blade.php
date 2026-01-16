@extends('layouts.app')

@section('content')
    <div id="img-cart" class="flex gap-12">
        <div id="img" class="flex flex-col gap-2">
            <img class="border-2 p-8 rounded-xl" src="{{asset('images/icons/cpu.png')}}" alt="">
            <h1 class="text-4xl bold">{{$product->name}}</h1>
        </div>
        <div id="cart">
            <form action="{{route('cart.addProduct', [$product])}}" method="POST">
                <button type="submit" class="bg-blue-500 rounded-xl">Add to cart</button>
                @csrf
            </form>
        </div>
    </div>
    <div class="mt-auto">
        There will be description
    </div>
@endsection
