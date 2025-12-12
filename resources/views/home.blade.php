<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>CompShop</title>
</head>
<body>
<div class="flex w-full bg-amber-50 fixed justify-between">
    <h1 class="text-5xl">COMPSHOP</h1>{{--Logo--}}
    <div class="flex justify-center gap-2 p-2">
        <input class="border-2 rounded-2xl p-2" type="text">
        <img class="w-fit h-10 cursor-pointer hover:scale-105 transition" src="{{ asset('images/icons/shopping-basket.png') }}" alt="user-icon">
        <img class="w-fit h-10 cursor-pointer hover:scale-105 transition" src="{{ asset('images/icons/user.png') }}" alt="user-icon">
    </div>
</div>
</body>
</html>
