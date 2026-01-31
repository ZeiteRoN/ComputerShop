@extends('layouts.app')

@section('content')
    <div id="filters" class="flex gap-8 h-full">
        <div class="flex flex-col w-1/4">

            @include('components.filters')
        </div>
        <div id="cards" class="w-3/4 gap-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($products as $product)
                    @include('components.product-card', ['product' => $product])
                @endforeach
            </div>
            <div class="flex w-full justify-end sticky top-24">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
