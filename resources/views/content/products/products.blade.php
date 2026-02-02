@extends('layouts.app')

@section('content')
    <div id="filters" class="flex gap-8 h-full">
        <div class="flex flex-col w-1/6">
            @include('components.filters')
        </div>
        <div id="cards" class="w-5/6 gap-6">
            <div class="grid grid-cols-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach($products as $product)
                    @include('components.product-card', ['product' => $product])
                @endforeach
            </div>
            <div class="flex justify-center mt-2">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
