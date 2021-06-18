<header class="flex flex-col w-full">
    <div class="flex flex-col items-center justify-between w-full md:flex-row ">
        <div class="flex items-center justify-center w-full md:justify-start md:w-1/2">
            <x-application-logo />
        </div>
        <nav
            class="flex flex-wrap items-start justify-center w-full pt-3 border-t md:pt-0 md:pr-6 md:items-center md:w-1/2 text-dark-400 border-dark-50 md:border-t-0">
            <ul class="flex flex-row items-center justify-around w-full md:flex-row">
                <li>{{ __('Patients') }}</li>
                <li>{{ __('Billing') }}</li>
                <li>{{ __('Eligibility') }}</li>
                <li>{{ __('Appointments') }}</li>
                <li>{{ __('Reports') }}</li>
            </ul>
            @isset($header)
            {{ $header }}
            @endisset
        </nav>
    </div>
    @isset($subheader)
    <nav
        class="flex flex-col items-center justify-center w-full pt-3 mt-3 border-t md:py-6 md:mt-0 md:flex-row border-dark-50 text-secondary-400 text-md">
        {{ $subheader }}
    </nav>
    @endisset
</header>
