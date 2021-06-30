<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title / Description -->
    <title>
        {{ isset($title) ? $title . ' - ' . config('app.name') . ' ' . config('app.version') : config('app.name') . ' ' . config('app.version') }}
    </title>
    <meta name="description" content="{{ isset($description) ? $description : '' }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/careus.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/theme.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/theme_print.css') }}" rel="stylesheet" media="print" />

    @stack('styles')

</head>

@guest

<body class="overflow-x-hidden text-xs antialiased lg:text-sm xl:text-base text-dark-700">

    <main class="flex flex-col items-center justify-center w-full min-h-screen md:flex-row flex-nowrap">
        {{ $slot }}
    </main>

    <!-- Scripts -->
    <script src=" {{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/careus.js') }}" defer></script>

</body>

@endguest

@auth

<body class="overflow-x-hidden text-xs antialiased lg:text-sm xl:text-base text-dark-700">

    <div class="flex flex-col w-full min-h-screen md:flex-row flex-nowrap"
        x-data="{ open: localStorage.getItem('sidebar_status') }"
        x-init="$watch('open', (value) => localStorage.setItem('sidebar_status', value))">

        <div :class="(open === 'false') ? 'w-full' : 'w-full md:w-9/12 xl:w-10/12'" class="flex w-full">
            <div class="flex flex-col items-start justify-between w-full">
                <div class="flex flex-col w-full">

                    @include('layouts.parts.header')

                    <main class="w-full border-t border-dark-50">
                        {{ $slot }}
                    </main>

                </div>

                @include('layouts.parts.footer')

            </div>
        </div>

        {{-- SIDEBAR --}}
        <div :class="(open === 'false') ? 'w-full md:w-5' : 'w-full md:3/12 lg:w-2/12'"
            class="flex w-full md:border-l md:relative md:flex-grow bg-secondary-900 text-brand-100 md:w-5">

            @include('layouts.parts.sidebar')

        </div>
        {{-- SIDEBAR --}}

    </div>

    <!-- Scripts -->
    <script src=" {{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/careus.js') }}" defer></script>

    @stack('scripts')

</body>

@endauth

</html>
