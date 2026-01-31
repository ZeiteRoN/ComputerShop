<div class="flex w-full h-16 bg-gray-800 justify-between items-center px-8 sticky top-0 shadow">
        <h1 class="text-2xl text-white font-bold tracking-wide">COMPSHOP</h1>
        <div class="flex text-2xl text-white gap-8">
            <a href="/products" class="{{request()->is('products*') ? "text-white": "text-white/80"}} hover:scale-105 transition">Home</a>
            <a href="/catalog" class="{{request()->is('catalog') ? "text-white": "text-white/80"}} hover:scale-105 transition">Catalog</a>
            <a href="/about" class="{{request()->is('about') ? "text-white": "text-white/80"}} hover:scale-105 transition">About</a>
        </div>
    @auth
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="inline-flex items-center gap-2 text-white hover:text-white/80 transition">
                {{ Auth::user()->name }}
                <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="open"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 @click.away="open = false"
                 class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">
                    Профіль
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">
                        Вийти
                    </button>
                </form>
            </div>
        </div>
    @else
        <div class="flex gap-2">
            <a href="{{ route('login') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-blue-50 transition">
                Login
            </a>
            <a href="{{route('register')}}" class="text-white hover:text-white/80 transition px-4 py-2">
                Register
            </a>
        </div>
    @endif
</div>
