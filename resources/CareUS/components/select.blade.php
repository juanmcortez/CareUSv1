@props(['disabled' => false, 'options' => [], 'default', 'selected', 'selectitle'])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'shadow-sm border-primary-200
    focus:border-primary-500 focus:ring-0 text-dark-400 focus:text-dark-600 placeholder-dark-200 transition duration-150
    ease-in-out']) !!}>
    <option value="">{{ __('Select an option') }}</option>
    @foreach ($options as $option)
    @php
    // If the title is a number do not translate!
    (is_numeric($option['title'])) ? $selectitle = $option['title'] : $selectitle = __($option['title']);
    @endphp

    @if(!empty($selected) && $selected == $option['value'])
    <option value="{{ $option['value'] }}" selected>{{ $selectitle }}</option>
    @elseif(!empty($default) && $default == $option['value'])
    <option value="{{ $option['value'] }}" selected>{{ $selectitle }}</option>
    @else
    <option value="{{ $option['value'] }}">{{ $selectitle }}</option>
    @endif

    @endforeach
</select>
