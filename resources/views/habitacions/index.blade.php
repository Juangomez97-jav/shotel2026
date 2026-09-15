
@extends('layouts.app')

@section('titulo', 'Habitaciones')

@section('cabecera', 'Habitaciones')

@section('contenido')

<div class="p-4 sm:p-6 lg:p-8">

    {{-- Encabezado --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>
            <h2 class="text-3xl font-bold text-base-content">
                Habitaciones
            </h2>

            <p class="text-base-content/60 mt-1">
                Consulta y administra las habitaciones registradas en SHotel.
            </p>
        </div>

        {{-- Botón nueva habitación --}}
        <a
            href="{{ route('habitacions.create') }}"
            class="btn btn-primary"
        >
            ➕ Nueva habitación
        </a>

    </div>


    {{-- Mensaje de éxito --}}
    @if(session('success'))

        <div class="alert alert-success shadow-sm mb-8">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 shrink-0"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            </svg>

            <span>
                {{ session('success') }}
            </span>

        </div>

    @endif


    {{-- Habitaciones --}}
    @if($habitacions->count())

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

            @foreach($habitacions as $habitacion)

                <div class="card bg-base-100 border border-base-300 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">


                    {{-- Imagen --}}
                    <figure class="relative h-46 bg-base-200">

                        @if($habitacion->imagen)

                            <img
                                src="{{ $habitacion->imagen }}"
                                alt="Habitación {{ $habitacion->nombre }}"
                                class="w-full h-full object-cover"
                            >

                        @else

                            <div class="flex flex-col items-center justify-center w-full h-full">

                                <span class="text-6xl">
                                    🛏️
                                </span>

                                <span class="text-base-content/50 mt-2">
                                    Sin imagen
                                </span>

                            </div>

                        @endif


                        {{-- Estado sobre la imagen --}}
                        <div class="absolute top-3 right-3">

                            @if(strtolower($habitacion->estado ?? '') === 'disponible')

                                <span class="badge badge-success badge-lg text-white shadow">
                                    Disponible
                                </span>

                            @elseif(strtolower($habitacion->estado ?? '') === 'ocupada')

                                <span class="badge badge-error badge-lg text-white shadow">
                                    Ocupada
                                </span>

                            @else

                                <span class="badge badge-warning badge-lg shadow">
                                    {{ ucfirst($habitacion->estado ?? 'Sin estado') }}
                                </span>

                            @endif

                        </div>

                    </figure>


                    {{-- Información --}}
                    <div class="card-body p-5">


                        {{-- Nombre --}}
                        <div class="mb-2">

                            <h2 class="card-title text-xl">
                                {{ $habitacion->nombre }}
                            </h2>

                        </div>


                        {{-- Descripción --}}
                        <p class="text-sm text-base-content/60 min-h-[32px]">
                            {{ $habitacion->descripcion ?? 'Sin descripción disponible.' }}
                        </p>


                        <div class="divider my-2"></div>


                        {{-- Información --}}
                        <div class="space-y-3">


                            {{-- Capacidad --}}
                            <div class="flex items-center justify-between">

                                <span class="text-sm text-base-content/60">
                                    Capacidad
                                </span>

                                <span class="font-medium">
                                    👤 {{ $habitacion->capacidad }} persona(s)
                                </span>

                            </div>


                            {{-- Estado --}}
                            <div class="flex items-center justify-between">

                                <span class="text-sm text-base-content/60">
                                    Estado
                                </span>

                                <span class="font-medium">
                                    {{ ucfirst($habitacion->estado ?? 'Sin estado') }}
                                </span>

                            </div>


                            {{-- Precio --}}
                            <div class="flex items-center justify-between">

                                <span class="text-sm text-base-content/60">
                                    Precio por noche
                                </span>

                                <span class="text-lg font-bold text-primary">
                                    ${{ number_format($habitacion->precio, 0, ',', '.') }}
                                </span>

                            </div>

                        </div>


                        {{-- Acciones --}}
                        <div class="card-actions grid grid-cols-3 gap-2 mt-5">


                            {{-- Ver --}}
                            <a
                                href="{{ route('habitacions.show', $habitacion) }}"
                                class="btn btn-sm btn-info text-white"
                            >
                            Ver
                            </a>


                            {{-- Editar --}}
                            <a
                                href="{{ route('habitacions.edit', $habitacion) }}"
                                class="btn btn-sm btn-warning"
                            >
                            Editar
                            </a>


                            {{-- Eliminar --}}
                            <form
                                action="{{ route('habitacions.destroy', $habitacion) }}"
                                method="POST"
                                onsubmit="return confirm('¿Desea eliminar esta habitación?');"
                                class="w-full"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-sm btn-error text-white w-full"
                                >
                                Eliminar
                                </button>

                            </form>


                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else


        {{-- Sin habitaciones --}}
        <div class="card bg-base-100 border border-base-300 shadow-md">

            <div class="card-body text-center items-center py-16">

                <div class="text-7xl mb-4">
                    🛏️
                </div>

                <h2 class="text-2xl font-bold">
                    No hay habitaciones registradas
                </h2>

                <p class="text-base-content/60 max-w-md">
                    Actualmente no existen habitaciones registradas en el sistema.
                    Puedes registrar la primera habitación para comenzar.
                </p>

                <a
                    href="{{ route('habitacions.create') }}"
                    class="btn btn-primary mt-4"
                >
                    ➕ Registrar habitación
                </a>

            </div>

        </div>

    @endif

</div>

@endsection

