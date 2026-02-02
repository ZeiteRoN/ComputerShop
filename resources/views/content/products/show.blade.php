@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4">
        <div id="img-cart" class="flex gap-12">
            <div id="img" class="flex flex-col gap-2">
                <img class="border-2 p-8 rounded-xl" src="{{asset('images/icons/cpu.png')}}" alt="">
                <h1 class="text-4xl bold">{{$product->name}}</h1>
            </div>
            <div>
                <div id="cart">
                    <form action="{{route('cart.product.add', [$product])}}" method="POST">
                        <button type="submit" class="bg-blue-500 rounded-xl">Add to cart</button>
                        @csrf
                    </form>
                </div>
                <div>
                    @foreach($productDetails as $key => $value)
                        <li>
                            <strong>{{ ucfirst($key) }}:</strong>

                            @if(is_array($value))
                                <ul>
                                    @foreach($value as $subKey => $subValue)
                                        <li>
                                            @if(is_string($subKey))
                                                <strong>{{ ucfirst($subKey) }}:</strong>
                                            @endif
                                            {{ $subValue }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                {{ $value }}
                            @endif
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-auto">
            {{$product->description}}
        </div>
        <div class="flex flex-wrap gap-4">
            @foreach($familiarProducts as $familiarProduct)
                @include('components.product-card', ['product' => $familiarProduct])
            @endforeach
        </div>
    </div>
@endsection
