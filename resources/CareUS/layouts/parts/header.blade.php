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
