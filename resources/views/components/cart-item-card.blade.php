<div class="flex w-full justify-between p-4 rounded-xl border hover:scale-105 transition">
    <div>
        <h1>{{ $item->product->name }}</h1>
        <p>Ціна: {{ $item->product->price }}</p>
        <p>Сума: {{ $item->product->price * $item->quantity }}</p>
    </div>
    <div class="flex gap-2 justify-center border rounded-xl h-fit p-2">
        <form type="submit" method="POST" action="{{route('cart.item.decrease', [$item])}}">
            <button>-</button>
            @csrf
        </form>
        <p>{{$item->quantity}}</p>
        <form type="submit" method="POST" action="{{route('cart.item.increase',[$item])}}">
            <button>+</button>
            @csrf
        </form>
    </div>
</div>
