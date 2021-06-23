@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-primary-500']) }}>
    {!! $value ?? $slot !!}
</label>
