<nav
    {{ $attributes->merge(["class" => "flex flex-wrap items-start justify-center w-full pt-3 border-t md:pt-0 md:items-center md:justify-between md:w-1/2 text-dark-400 border-dark-50 md:border-t-0"]) }}>
    <ul class="flex flex-row items-center justify-between w-full px-3 md:flex-row md:px-0">
        <li class="{{ (request()->routeIs('patient.*')) ? 'font-semibold' : '' }}">
            <a class="transition-colors duration-150 ease-in-out hover:text-dark-200"
                href="{{ route('patient.list') }}">
                {{ __('Patients') }}
            </a>
        </li>
        <li class="{{ (request()->routeIs('billing.*')) ? 'font-semibold' : '' }}">
            <a class="transition-colors duration-150 ease-in-out hover:text-dark-200"
                href="{{ route('billing.index') }}">
                {{ __('Billing') }}
            </a>
        </li>
        <li class="{{ (request()->routeIs('eligibility.*')) ? 'font-semibold' : '' }}">
            <a class="transition-colors duration-150 ease-in-out hover:text-dark-200"
                href="{{ route('eligiblity.index') }}">
                {{ __('Eligibility') }}
            </a>
        </li>
        <li class="{{ (request()->routeIs('appointment.*')) ? 'font-semibold' : '' }}">
            <a class="transition-colors duration-150 ease-in-out hover:text-dark-200"
                href="{{ route('appointment.index') }}">
                {{ __('Appointments') }}
            </a>
        </li>
        <li class="{{ (request()->routeIs('reports.*')) ? 'font-semibold' : '' }}">
            <a class="transition-colors duration-150 ease-in-out hover:text-dark-200"
                href="{{ route('patient.list') }}">
                {{ __('Reports') }}
            </a>
        </li>
    </ul>
</nav>
