@props([
'download' => '',
'excel' => '',
'csv' => '',
])
@if(request()->routeIs('patients.list'))
<li>
    <a href="{{ route('patients.list') }}" title="{{ __('New Patient') }}"
        class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-primary-400 text-primary-900 hover:bg-primary-900 hover:text-primary-400">
        <i class="text-sm fas fa-user-plus"></i>
    </a>
</li>
@endif

@if($download)
<li>
    <a href="{{ route('patients.list') }}" title="{{ __('Download') }}"
        class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-secondary-800 text-secondary-50 hover:bg-secondary-50 hover:text-secondary-800">
        <i class="text-sm fas fa-file-download"></i>
    </a>
</li>
@endif

@if($excel)
<li>
    <a href="{{ route('patients.list') }}" title="{{ __('Excel export') }}"
        class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-secondary-800 text-secondary-50 hover:bg-secondary-50 hover:text-secondary-800">
        <i class="text-sm fas fa-file-excel"></i>
    </a>
</li>
@endif

@if($csv)
<li>
    <a href="{{ route('patients.list') }}" title="{{ __('CSV export') }}"
        class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-secondary-800 text-secondary-50 hover:bg-secondary-50 hover:text-secondary-800">
        <i class="text-sm fas fa-file-csv"></i>
    </a>
</li>
@endif

<li>
    <a href="{{ route('patients.list') }}" title="{{ __('Print') }}"
        class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-secondary-800 text-secondary-50 hover:bg-secondary-50 hover:text-secondary-800">
        <i class="text-sm fas fa-print"></i>
    </a>
</li>
