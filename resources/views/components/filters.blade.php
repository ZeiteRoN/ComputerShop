<div class="flex sticky top-24">
    <form action="/products" class="flex flex-col gap-2 mr-4">
        <input type="text" placeholder="Name" name="search" value="{{request('search')}}">
        <input type="text" placeholder="Min price" name="min_price" value="{{request('min_price')}}">
        <input type="text" placeholder="Max price" name="max_price" value="{{request('max_price')}}">
        <select name="sort" id="">
            <option value="" @selected(request(('sort')==''))>Without</option>
            <option value="price_asc" @selected(request('sort') == 'price_asc')>Price asc</option>
            <option value="price_desc" @selected(request('sort') == 'price_desc')>Price desc</option>
            <option value="name_asc" @selected(request('sort') == 'name_asc')>Name A-Z</option>
            <option value="name_desc" @selected(request('sort') == 'name_desc')>Name Z-A</option>
        </select>
        <div class="flex flex-wrap gap-2">
            <input type="checkbox" name="categories[]" value="1" @checked(in_array(1, request('categories', [])))>
            <input type="checkbox" name="categories[]" value="2" @checked(in_array(2, request('categories', [])))>
            <input type="checkbox" name="categories[]" value="3" @checked(in_array(3, request('categories', [])))>
        </div>
        <button type="submit" class="bg-blue-500 rounded-3xl">Add filter</button>
        <a href="/products" class="bg-red-300 rounded-3xl text-center py-1">
            Reset
        </a>    </form>
</div>
