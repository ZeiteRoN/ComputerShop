<a href="{{route('products.show', $product)}}">
    <div class="flex flex-col shadow-sm hover:shadow-md gap-2 mx-auto w-52 min-w-[160px] h-72 border border-gray-200 rounded-xl p-8 hover:scale-105 transition ease-in-out duration-150 cursor-pointer hover:border-dotted">
        <div id="image" class="flex justify-center">
            <img class="max-w-28 max-h-28" src="{{asset('images/icons/' . $product->getCategoryIcon())}}" alt="">
        </div>
        <div id="info" class="border-b text-sm">
            <p class="font-semibold">{{$product->name}}</p>
            <p class="text-xs text-gray-500">{{$product->getCategoryName()}}</p>
        </div>
        <div id="info" class="flex justify-between">
            <div class="flex flex-col justify-center">
                <p class="font-bold">{{$product->price}}</p>
            </div>
            @auth
                <div class="flex flex-col justify-center">
                    <form action="{{route('cart.product.add', [$product])}}" method="POST">
                        <button type="submit" class="text-3xl hover:text-gray-500">+</button>
                        @csrf
                    </form>
                </div>
            @endauth
        </div>
    </div>
</a>
