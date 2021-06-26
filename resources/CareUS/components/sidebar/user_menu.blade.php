<div class="flex flex-row flex-wrap items-center justify-center w-full md:flex-col md:items-center md:justify-start">

    <div class="flex flex-col w-full py-5 pl-5 text-left border-t border-secondary-800">
        <a href="{{ route('practice.index') }}" class="mb-4 text-sm {{ request()->routeIs('practice.*') ? 'text-primary-100' : 'text-primary-400' }}
    hover:text-primary-500 transform duration-150 ease-in-out">
            <i class="w-4 text-xs fas fa-hospital"></i>
            {{ __('Practice') }}
        </a>
        <a href="{{ route('insurances.index') }}"
            class="mb-4 text-sm {{ request()->routeIs('insurances.*') ? 'text-primary-100' : 'text-primary-400' }} hover:text-primary-500 transform duration-150 ease-in-out">
            <i class="w-4 text-xs fas fa-briefcase-medical"></i>
            {{ __('Insurances') }}
        </a>
        <a href="{{ route('codes.index') }}"
            class="mb-4 text-sm {{ request()->routeIs('codes.*') ? 'text-primary-100' : 'text-primary-400' }} hover:text-primary-500 transform duration-150 ease-in-out">
            <i class="w-4 text-xs fas fa-clipboard-list"></i>
            {{ __('Codes') }}
        </a>
        <a href="{{ route('careus.settings.lists') }}"
            class="text-sm {{ request()->routeIs('careus.*') ? 'text-primary-100' : 'text-primary-400' }} hover:text-primary-500 transform duration-150 ease-in-out">
            <i class="w-4 text-xs fas fa-tools"></i>
            {!! __(':name settings', ['name' => 'Care<span class="font-semibold">US</span>']) !!}
        </a>
    </div>

    <div class="flex flex-col w-full py-5 pl-5 text-left border-t border-secondary-800">
        <a href="{{ route('users.profile') }}"
            class="text-sm text-left {{ request()->routeIs('users.profile') ? 'text-primary-100' : 'text-primary-400' }} hover:text-primary-500 transform duration-150 ease-in-out">
            <i class="w-4 text-xs fas fa-user-cog"></i>
            @empty(auth()->user()->persona->first_name)
            {!! __('<strong>:name</strong>\'s profile', ['name' => auth()->user()->email]) !!}
            @else
            {!! __('<strong>:name</strong>\'s profile', ['name' => auth()->user()->persona->first_name]) !!}
            @endempty
        </a>
    </div>

    {{--
<div class="flex flex-col w-full py-5 border-t border-gunmetal-400">
    <form method="POST" action="{{ route('logout') }}" class="text-sm">
    @csrf
    <span class="mr-3 text-xs text-gunmetal-400">
        {{ __('Last login: :date', ['date' => date('M d, Y')]) }}
    </span>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
        class="text-sm text-primary-400 hover:text-primary-600">
        {{ __('Log Out') }}
    </a>
    </form>
</div>
--}}
</div>
