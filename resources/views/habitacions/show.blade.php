@extends('layouts.app')

@section('titulo', 'Detalle de habitación')

@section('cabecera', 'Detalle de habitación')

@section('contenido')

<div class="p-6">

    <div class="max-w-5xl mx-auto">

        <div class="card lg:card-side bg-base-100 shadow-xl border border-base-300">

            {{-- Imagen --}}
            <figure class="lg:w-1/2 min-h-80 bg-base-200">

                @if($habitacion->imagen)

                    <img
                        src="{{ $habitacion->imagen }}"
                        alt="Habitación {{ $habitacion->nombre }}"
                        class="w-full h-full object-cover"
                    >

                @else

                    <div class="flex flex-col items-center justify-center">
                        <span class="text-8xl">🛏️</span>

                        <span class="text-base-content/50 mt-3">
                            Sin imagen
                        </span>
                    </div>

                @endif

            </figure>


            {{-- Información --}}
            <div class="card-body">

                <h2 class="card-title text-3xl">
                    {{ $habitacion->nombre }}
                </h2>


                <div class="divider"></div>


                {{-- Descripción --}}
                <div>
                    <h3 class="font-bold text-lg">
                        Descripción
                    </h3>

                    <p class="text-base-content/70 mt-2">
                        {{ $habitacion->descripcion ?? 'Sin descripción disponible.' }}
                    </p>
                </div>


                {{-- Capacidad --}}
                <div class="mt-4">

                    <h3 class="font-bold text-lg">
                        Capacidad
                    </h3>

                    <p class="mt-2">
                        👤 {{ $habitacion->capacidad }} persona(s)
                    </p>

                </div>


                {{-- Precio --}}
                <div class="mt-4">

                    <h3 class="font-bold text-lg">
                        Precio por noche
                    </h3>

                    <p class="text-2xl font-bold text-primary mt-2">
                        ${{ number_format($habitacion->precio, 0, ',', '.') }}
                    </p>

                </div>

                {{-- Estado --}}
                <div class="mt-4"></div>

                    <h3 class="font-bold text-lg">
                        Estado
                    </h3>

                    <p class="mt-2">
                        {{$habitacion->estado}}
                    </p>


                {{-- Acciones --}}
                <div class="card-actions justify-end mt-6">

                    <a
                        href="{{ route('habitacions.index') }}"
                        class="btn btn-ghost"
                    >
                        ← Volver
                    </a>

                    <a
                        href="{{ route('habitacions.edit', $habitacion) }}"
                        class="btn btn-warning"
                    >
                        ✏️ Editar
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection