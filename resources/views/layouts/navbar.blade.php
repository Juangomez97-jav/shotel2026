
{{-- ============================================================
     MENÚ VERTICAL PRINCIPAL DE SHOTEL
============================================================ --}}

<nav
    class="fixed left-0 top-0 z-50 w-64 h-screen
           bg-base-100 shadow-lg border-r border-base-300"
>


    {{-- ========================================================
         LOGO
    ========================================================= --}}

    <div class="p-5 border-b border-base-300">

        <a
            href="{{ route('inicio') }}"
            class="flex items-center gap-3"
        >

            <span class="text-3xl">
                🏨
            </span>

            <span class="text-2xl font-bold text-primary">
                SHotel
            </span>

        </a>

    </div>



    {{-- ========================================================
         MENÚ PRINCIPAL
    ========================================================= --}}

    <ul class="menu p-4 gap-2">


        {{-- Inicio --}}
        <li>

            <a
                href="{{ route('inicio') }}"
                class="{{ request()->routeIs('inicio') ? 'active' : '' }}
                       text-base font-medium"
            >

                <span class="text-xl">
                    🏠
                </span>

                Inicio

            </a>

        </li>



        {{-- Habitaciones --}}
        <li>

            <a
                href="{{ route('habitacions.index') }}"
                class="{{ request()->routeIs('habitacions.*') ? 'active' : '' }}
                       text-base font-medium"
            >

                <span class="text-xl">
                    🛏️
                </span>

                Habitaciones

            </a>

        </li>



        {{-- Registros --}}
        <li>

            <a
                href="#"
                class="text-base font-medium"
            >

                <span class="text-xl">
                    📋
                </span>

                Registros

            </a>

        </li>



        {{-- Clientes --}}
        <li>

            <a
                href="#"
                class="text-base font-medium"
            >

                <span class="text-xl">
                    👥
                </span>

                Clientes

            </a>

        </li>



        {{-- Productos --}}
        <li>

            <a
                href="#"
                class="text-base font-medium"
            >

                <span class="text-xl">
                    🛒
                </span>

                Productos

            </a>

        </li>



        {{-- Facturas --}}
        <li>

            <a
                href="#"
                class="text-base font-medium"
            >

                <span class="text-xl">
                    🧾
                </span>

                Facturas

            </a>

        </li>


    </ul>

</nav>



{{-- ============================================================
     MENÚ HORIZONTAL DE HABITACIONES
============================================================ --}}

@if(request()->routeIs('habitacions.*'))

    <nav
        class="fixed top-0 left-64 right-0 z-40
               h-16
               bg-base-100
               border-b border-base-300
               shadow-sm"
    >

        <div class="h-full flex items-center px-6 gap-2">


            {{-- Título --}}
            <div
                class="font-bold text-primary
                       mr-5 whitespace-nowrap"
            >

                🛏️ Habitaciones

            </div>



            {{-- Separador --}}
            <div class="h-7 w-px bg-base-300 mr-2"></div>



            {{-- Lista --}}
            <a
                href="{{ route('habitacions.index') }}"
                class="btn btn-sm
                    {{ request()->routeIs('habitacions.index')
                        ? 'btn-primary'
                        : 'btn-ghost' }}"
            >

                📋 Lista

            </a>



            {{-- Nueva habitación --}}
            <a
                href="{{ route('habitacions.create') }}"
                class="btn btn-sm
                    {{ request()->routeIs('habitacions.create')
                        ? 'btn-primary'
                        : 'btn-ghost' }}"
            >

                ➕ Nueva habitación

            </a>


        </div>

    </nav>

@endif
