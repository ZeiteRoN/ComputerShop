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
    <input type="text" placeholder="Name" name="search" value="{{request('search')}}">
    <input type="text" placeholder="Min price" name="min_price" value="{{request('min_price')}}">
    <input type="text" placeholder="Max price" name="max_price" value="{{request('max_price')}}">
    <select name="sort" id="">
        <option value="" @selected(request('sort'==''))>Without</option>
        <option value="price_asc" @selected(request('sort') == 'price_asc')>Price asc</option>
        <option value="price_desc" @selected(request('sort') == 'price_desc')>Price desc</option>
        <option value="name_asc" @selected(request('sort') == 'name_asc')>Name A-Z</option>
        <option value="name_desc" @selected(request('sort') == 'name_desc')>Name Z-A</option>
    </select>
    <input type="checkbox" name="categories[]" value="1" @checked(in_array(1, request('categories', [])))>
    <input type="checkbox" name="categories[]" value="2" @checked(in_array(1, request('categories', [])))>
    <input type="checkbox" name="categories[]" value="3" @checked(in_array(1, request('categories', [])))>
    <button type="submit">Add filter</button>
</form>
<div class="flex gap-8">
    @foreach($filters as $key => $value)
        @include('components.filter-card', ['key' => $key, '$value' => $value])
    @endforeach
</div>
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
