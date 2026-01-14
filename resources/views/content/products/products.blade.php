@extends('layouts.app')

@section('content')
    <div id="filters" class="flex gap-8 h-full">
        <div class="flex flex-col w-1/4">
            <div class="flex flex-wrap gap-2">
                @foreach($filters as $key => $value)
                    @include('components.filter-card', ['key' => $key, 'value' => $value])
                @endforeach
            </div>
            @include('components.filters')
        </div>
        <div id="cards" class="w-3/4">
            <div class="grid grid-cols-4 gap-6">
                @foreach($products as $product)
                    @include('components.product-card', ['product' => $product])
                @endforeach
            </div>
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
