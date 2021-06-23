@props([
'color' => 'secondary',
'icon' => 'info-circle',
'title' => 'Info',
'description'
])
<div
    class="absolute flex flex-row w-full max-w-xl mx-auto overflow-hidden bg-{{ $color }}-50 rounded-lg shadow-md top-32 mt-1 right-32 dark:bg-gray-800">
    <div class="flex flex-row flex-shrink-0 items-center justify-center w-16 bg-{{ $color }}-500">
        <i class="text-xl fa fa-{{ $icon }} text-{{ $color }}-50"></i>
    </div>
    <div class="flex flex-row items-center justify-start w-full px-4 py-2 -mx-3">
        <div class="w-full mx-3">
            <span class="font-semibold text-{{ $color }}-700 uppercase">{{ __($title) }}</span>
            @if (is_array($description))
            @foreach ($description as $itdx => $item)
            <p class="mt-1 text-sm text-{{ $color }}-700">{!! $item !!}</p>
            @endforeach
            @else
            <p class="mt-1 text-sm text-{{ $color }}-700">{!! $description !!}</p>
            @endif
        </div>
    </div>
</div>
