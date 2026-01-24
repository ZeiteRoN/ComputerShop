<div class="flex w-full h-16 bg-blue-300 justify-between items-center px-8 sticky top-0 shadow">
        <h1 class="text-2xl font-bold tracking-wide">COMPSHOP</h1>
        <div class="flex text-2xl text-white gap-8">
            <a href="/products" class="{{request()->is('products*') ? "text-white": "text-white/80"}} hover:scale-105 transition">Home</a>
            <a href="/catalog" class="{{request()->is('catalog') ? "text-white": "text-white/80"}} hover:scale-105 transition">Catalog</a>
            <a href="/about" class="{{request()->is('about') ? "text-white": "text-white/80"}} hover:scale-105 transition">About</a>
        </div>
    @auth
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center gap-2 text-gray-700">
                    {{ Auth::user()->name }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    Профіль
                </x-dropdown-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Вийти
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    @endauth
</div>
