@props([
'color' => 'secondary',
'icon' => 'info-circle',
'title' => 'Info',
'description'
])
<div class="w-full border text-{{ $color }}-600 bg-{{ $color }}-100 border-{{ $color }}-200">
    <div class="flex items-center justify-between px-10 py-3">
        <div class="flex flex-col">
            @if (is_array($description))
            @foreach ($description as $itdx => $item)
            <p class="@if($itdx > 0) mt-1 @endif text-sm tracking-wide">
                <strong class="mr-1 uppercase">{{ __($title) }}</strong>
                <i class="mr-1 text-xs fa fa-arrow-right"></i>
                {!! $item !!}
            </p>
            @endforeach
            @else
            <p class="text-sm tracking-wide">
                <strong class="mr-2 uppercase">{{ __($title) }}</strong> {!! $description !!}
            </p>
            @endif
        </div>
        <i class="text-lg fa fa-{{ $icon }}"></i>
    </div>
</div>
