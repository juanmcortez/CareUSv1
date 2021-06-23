@props(['disabled' => false, 'options' => [], 'default', 'selected'])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'shadow-sm border-primary-200
    focus:border-primary-500 focus:ring-0 text-dark-400 focus:text-dark-600 placeholder-dark-200 transition duration-150
    ease-in-out']) !!}>
    @foreach ($options as $option)
    @if(!empty($selected) && $selected == $option['value'])
    <option value="{{ $option['value'] }}" selected>{{ __($option['title']) }}</option>
    @elseif(!empty($default) && $default == $option['value'])
    <option value="{{ $option['value'] }}" selected>{{ __($option['title']) }}</option>
    @else
    <option value="{{ $option['value'] }}">{{ __($option['title']) }}</option>
    @endif
    @endforeach
</select>
