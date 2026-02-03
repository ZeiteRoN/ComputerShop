@extends('layouts.app')

@section('content')
    <div class="flex gap-8">
        <div class="flex flex-col gap-4">
            <div id="img-cart" class="flex gap-12">
                <div id="img" class="flex flex-col gap-2">
                    <img class="border-2 p-8 rounded-xl" src="{{asset('images/icons/cpu.png')}}" alt="">
                    <h1 class="text-4xl bold">{{$product->name}}</h1>
                </div>
            </div>
            <div class="flex flex-wrap gap-4">
                @foreach($familiarProducts as $familiarProduct)
                    @include('components.product-card', ['product' => $familiarProduct])
                @endforeach
            </div>
        </div>
        <div class="flex flex-col mx-auto gap-8 p-8">
            <div>
                @foreach($productDetails as $key => $value)
                    @if(is_array($value))
                        <ul>
                            @foreach($value as $subKey => $subValue)
                                <li>
                                    @if(is_string($subKey))
                                        <p class="font-medium text-xl">{{ ucfirst($subKey) }}:</p>
                                    @endif
                                    {{ $subValue }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>
            <div class="">
                <h1 class="font-bold text-2xl">Опис:</h1>
                {{$product->description}}
            </div>
            <div id="cart" class="flex w-full justify-center">
                <form action="{{route('cart.product.add', [$product])}}" method="POST">
                    <button type="submit" class="text-4xl font-bold bg-green-300 rounded-xl p-4 hover:bg-green-400 hover:scale-105 transition-all">Add to cart</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
