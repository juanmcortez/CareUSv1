<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link href="{{ mix('css/careus.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/theme.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/theme_print.css') }}" rel="stylesheet" media="print" />
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>

    <!-- Scripts -->
    <script src=" {{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/careus.js') }}" defer></script>
</body>

</html>
