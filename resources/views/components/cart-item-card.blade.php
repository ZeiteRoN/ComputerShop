<div class="w-full p-4 rounded-xl border hover:scale-105 transition">
    <h1>{{ $item->product->name }}</h1>
    <p>Ціна: {{ $item->product->price }}</p>
    <p>Кількість: {{ $item->quantity }}</p>
    <p>Сума: {{ $item->product->price * $item->quantity }}</p>
</div>
