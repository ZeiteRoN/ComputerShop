<div class="flex w-24 h-10 border rounded-xl p-4 shadow">
    <div class="text-sm text-gray-500">
        {{ $key }}
    </div>

    <div class="font-semibold">
        @if(is_array($value))
            {{ implode(', ', $value) }}
        @else
            {{ $value }}
        @endif
    </div>
</div>
