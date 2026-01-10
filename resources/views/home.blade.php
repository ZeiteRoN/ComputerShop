<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>CompShop</title>
</head>
<body class="min-h-screen flex flex-col">
<div class="flex w-full h-16 bg-amber-50 justify-between items-center px-2">
    <h1 class="text-5xl">COMPSHOP</h1>
    <div class="flex items-center gap-2">
        <input class="border-2 rounded-2xl p-2" type="text">
        <img class="h-10 cursor-pointer hover:scale-105 transition"
             src="{{ asset('images/icons/shopping-basket.png') }}" alt="basket">
        <img class="h-10 cursor-pointer hover:scale-105 transition"
             src="{{ asset('images/icons/user.png') }}" alt="user">
    </div>
</div>
<div id="content" class="flex-1 w-full p-2">
    <div>

    </div>
    <div class="flex flex-wrap gap-2">
        @each('components.product-card', $products, 'product')
    </div>
</div>
</body>
</html>
