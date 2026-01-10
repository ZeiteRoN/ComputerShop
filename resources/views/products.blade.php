<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
<form action="/products">
    <input type="text" placeholder="Name" name="search">
    <input type="text" placeholder="Min price" name="min_price">
    <input type="text" placeholder="Max price" name="max_price">
    <select name="sort" id="">
        <option value="">Without</option>
        <option value="price_asc">Price asc</option>
        <option value="price_desc">Price decs</option>
        <option value="name_asc">Name A-Z</option>
        <option value="name_desc">Name Z-A</option>
    </select>
    <button type="submit">Add filter</button>
</form>
<div class="grid grid-cols-2 gap-4">
    @foreach($products as $product)
        @include('components.product-card', ['product' => $product])
    @endforeach
</div>
<div class="mt-6">
    {{ $products->links() }}
</div>
</body>
</html>
