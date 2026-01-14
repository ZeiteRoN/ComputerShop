<div class="flex border rounded-xl p-4 shadow">
    <div class="text-xs text-gray-500">
        {{ $key }}
    </div>

    <div class="font-semibold">
        @if(is_array($value))
            {{ implode(', ', $value) }}
        @else
            {{ $value }}
        @endif
    </div>
    <div>
        <button><img src="{{asset('images/icons/cancel.png')}}" alt="" class="size-8 cursor-pointer hover:scale-105 transition"></button>
    </div>
</div>
