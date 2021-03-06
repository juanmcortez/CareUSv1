<div class="flex flex-row flex-wrap items-center justify-center w-full md:flex-col md:items-center md:justify-start">

    <div class="flex flex-col w-full py-5 pl-5 text-left border-t border-secondary-800">
        <a href="{{ route('practice.index') }}" class="mb-4 text-sm {{ request()->routeIs('practice.*') ? 'text-primary-100' : 'text-primary-400' }}
    hover:text-primary-500 transform duration-150 ease-in-out">
            <i class="w-4 text-xs fas fa-hospital"></i>
            {{ __('Practice') }}
        </a>
        <a href="{{ route('insurance.index') }}"
            class="mb-4 text-sm {{ request()->routeIs('insurance.*') ? 'text-primary-100' : 'text-primary-400' }} hover:text-primary-500 transform duration-150 ease-in-out">
            <i class="w-4 text-xs fas fa-briefcase-medical"></i>
            {{ __('Insurances') }}
        </a>
        <a href="{{ route('code.index') }}"
            class="mb-4 text-sm {{ request()->routeIs('code.*') ? 'text-primary-100' : 'text-primary-400' }} hover:text-primary-500 transform duration-150 ease-in-out">
            <i class="w-4 text-xs fas fa-clipboard-list"></i>
            {{ __('Codes') }}
        </a>
        <a href="{{ route('careus.setting.list') }}"
            class="text-sm {{ request()->routeIs('careus.*') ? 'text-primary-100' : 'text-primary-400' }} hover:text-primary-500 transform duration-150 ease-in-out">
            <i class="w-4 text-xs fas fa-tools"></i>
            {!! __(':name settings', ['name' => 'Care<span class="font-semibold">US</span>']) !!}
        </a>
    </div>

    <div class="flex flex-col w-full py-5 pl-5 text-left border-t border-secondary-800">
        <a href="{{ route('user.profile') }}"
            class="text-sm text-left {{ request()->routeIs('user.profile') ? 'text-primary-100' : 'text-primary-400' }} hover:text-primary-500 transform duration-150 ease-in-out">
            <i class="w-4 text-xs fas fa-user-cog"></i>
            @empty(auth()->user()->persona->first_name)
            {!! __('<strong>:name</strong>\'s profile', ['name' => auth()->user()->email]) !!}
            @else
            {!! __('<strong>:name</strong>\'s profile', ['name' => auth()->user()->persona->first_name]) !!}
            @endempty
        </a>
    </div>
</div>
