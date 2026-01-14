<div class="flex w-full h-16 bg-linear-to-r from-cyan-400 to-blue-400 justify-between items-center px-8 sticky top-0 shadow">
        <h1 class="text-2xl font-bold tracking-wide">COMPSHOP</h1>
        <div class="flex text-2xl text-white gap-8">
            <a href="/products" class="{{request()->is('products*') ? "text-white": "text-white/80"}} hover:scale-105 transition">Home</a>
            <a href="/catalog" class="{{request()->is('catalog') ? "text-white": "text-white/80"}} hover:scale-105 transition">Catalog</a>
            <a href="/about" class="{{request()->is('about') ? "text-white": "text-white/80"}} hover:scale-105 transition">About</a>
        </div>
        <div class="flex items-center gap-2">
            <input class="border-2 rounded-xl p-2 bg-white hover:scale-102 transition" type="text">
            <img class="h-10 cursor-pointer hover:scale-105 transition"
                 src="{{ asset('images/icons/shopping-basket.png') }}" alt="basket">
            <img class="h-10 cursor-pointer hover:scale-105 transition"
                 src="{{ asset('images/icons/user.png') }}" alt="user">
        </div>
</div>
