<a href="{{route('products.show', $product)}}">
    <div class="flex flex-col w-40 h-60 border border-gray-200 rounded-xl p-2 hover:scale-103 transition cursor-pointer hover:border-dotted">
        <div id="image">
            <img src="{{asset('images/icons/cpu.png')}}" alt="">
        </div>
        <div id="info">
            {{$product->name}}
        </div>
        <div id="info">
            {{$product->price}}
        </div>
    </div>
</a>
