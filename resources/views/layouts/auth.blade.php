<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="this is a food market app" />
        <meta name="author" content="Hafizh Maulana Y" />

        <title>@yield('title')</title>

        {{-- style --}}
        @stack('prepen-style')
        @include('includes.style')
        @stack('addon-style')

    </head>

    <body>

        {{-- content --}}
        @yield('content')

        {{-- script --}}
        @stack('preppen-script')
        @include('includes.script')
        @stack('addon-script') 
    </body>
</html>
