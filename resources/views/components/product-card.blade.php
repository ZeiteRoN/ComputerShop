<div class="flex flex-col w-40 h-60 bg-blue-50 p-1">
    <div id="favourite" class="flex justify-end">
        <input id="like" class="size-8" type="image" src="{{asset('images/icons/unliked.png')}}">
    </div>
    <div id="image">

    </div>
    <div id="info">
        {{$product->name}}
    </div>
    <div id="info">
        {{$product->price}}
    </div>
</div>
<script>
    const likeInput = document.getElementById('like')
    let likeSource = likeInput.getAttribute('src')

    likeInput.addEventListener('click', function () {
        likeSource === 'images/icons/liked.png' ? likeInput.setAttribute('src', 'images/icons/unliked.png') : likeInput.setAttribute('src', 'images/icons/liked.png')
    })
</script>
