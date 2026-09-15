
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo', 'SHotel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-base-200 min-h-screen">


    {{-- ============================================================
         NAVBAR
    ============================================================= --}}

    <header>
        @include('layouts.navbar')
    </header>


    {{-- ============================================================
         CONTENIDO PRINCIPAL
    ============================================================= --}}

    <main class="ml-24">


        {{-- Espacio para navbar horizontal --}}
        @if(request()->routeIs('habitacions.*'))

            <div class="h-16"></div>

        @endif


        {{-- ========================================================
             CABECERA
        ========================================================= --}}

        <div class="bg-base-100 border-b border-base-300">

            <div class="px-6 py-4">

                <h1 class="text-xl font-semibold uppercase">
                    @yield('cabecera')
                </h1>

            </div>

        </div>


        {{-- ========================================================
             CONTENIDO
        ========================================================= --}}

        <div class="w-full">

            @yield('contenido')

        </div>


    </main>


    {{-- ============================================================
         FOOTER
    ============================================================= --}}

    <footer class="ml-64">

        @include('layouts.footer')

    </footer>


</body>

</html>
