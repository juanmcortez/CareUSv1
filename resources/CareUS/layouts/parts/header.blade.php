<header class="flex flex-col w-full">
    <div class="flex flex-col items-center justify-between w-full md:flex-row ">
        <div class="flex items-center justify-center w-full md:justify-start md:w-1/2">
            <x-logo class="md:ml-12" />
        </div>

        <x-menu.main class="md:mr-12" />

    </div>
    @isset($subheader)
    <nav
        class="flex flex-col items-center justify-center w-full md:border-t md:py-6 md:flex-row md:border-dark-50 text-secondary-400">
        {{ $subheader }}
    </nav>
    @endisset
</header>

{{-- SYSTEM MESSAGES --}}
@if($errors->any())
<x-alerts.ribbon color="red" icon="times-circle" title="Error" :description="$errors->all()" />
@endif

@if (Session::has('success'))
<x-alerts.ribbon color="green" icon="check-circle" title="" :description="session('success')" />
@endif

@if (Session::has('info'))
<x-alerts.ribbon :description="session('info')" />
@endif

@if (Session::has('status'))
<x-alerts.ribbon title="Status" :description="session('status')" />
@endif
{{-- SYSTEM MESSAGES --}}
