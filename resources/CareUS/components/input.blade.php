@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'shadow-sm border-primary-200
focus:border-primary-500 focus:ring-0 text-dark-400 focus:text-dark-600 placeholder-dark-200 transition duration-150
ease-in-out']) !!} />
