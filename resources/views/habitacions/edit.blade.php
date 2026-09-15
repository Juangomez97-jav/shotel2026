@extends('layouts.app')

@section('titulo', 'Editar habitación')

@section('cabecera', 'Editar habitación')

@section('contenido')

<div class="p-6">

    <div class="max-w-3xl mx-auto">

        <div class="card bg-base-100 shadow-xl border border-base-300">

            <div class="card-body">

                <h2 class="card-title text-2xl">
                    Editar habitación
                </h2>

                <p class="text-base-content/70 mb-4">
                    Modifica la información de la habitación.
                </p>


                <form
                    action="{{ route('habitacions.update', $habitacion) }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')


                    {{-- Nombre --}}
                    <div class="form-control mb-4">

                        <label for="nombre" class="label">
                            <span class="label-text font-semibold">
                                Nombre de la habitación
                            </span>
                        </label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre', $habitacion->nombre) }}"
                            class="input input-bordered w-full @error('nombre') input-error @enderror"
                            required
                        >

                        @error('nombre')
                            <span class="text-error text-sm mt-1">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Descripción --}}
                    <div class="form-control mb-4">

                        <label for="descripcion" class="label">
                            <span class="label-text font-semibold">
                                Descripción
                            </span>
                        </label>

                        <textarea
                            id="descripcion"
                            name="descripcion"
                            rows="4"
                            class="textarea textarea-bordered w-full @error('descripcion') textarea-error @enderror"
                        >{{ old('descripcion', $habitacion->descripcion) }}</textarea>

                        @error('descripcion')
                            <span class="text-error text-sm mt-1">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Precio --}}
                    <div class="form-control mb-4">

                        <label for="precio" class="label">
                            <span class="label-text font-semibold">
                                Precio
                            </span>
                        </label>

                        <label class="input input-bordered flex items-center gap-2">

                            <span class="text-base-content/60">
                                $
                            </span>

                            <input
                                type="number"
                                id="precio"
                                name="precio"
                                value="{{ old('precio', $habitacion->precio) }}"
                                min="0"
                                step="0.01"
                                class="grow"
                                required
                            >

                        </label>

                        @error('precio')
                            <span class="text-error text-sm mt-1">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Capacidad --}}
                    <div class="form-control mb-4">

                        <label for="capacidad" class="label">
                            <span class="label-text font-semibold">
                                Capacidad
                            </span>
                        </label>

                        <input
                            type="number"
                            id="capacidad"
                            name="capacidad"
                            value="{{ old('capacidad', $habitacion->capacidad) }}"
                            min="1"
                            class="input input-bordered w-full @error('capacidad') input-error @enderror"
                            required
                        >

                        @error('capacidad')
                            <span class="text-error text-sm mt-1">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Estado --}}
                    <div class="form-control mb-4">

                        <label for="estado" class="label">
                            <span class="label-text font-semibold">
                                Estado
                            </span>
                        </label>

                        <select
                            id="estado"
                            name="estado"
                            class="select select-bordered w-full @error('estado') select-error @enderror"
                            required
                        >
                            <option value="" disabled>
                                Selecciona un estado
                            </option>
                            <option value="disponible" {{ old('estado', $habitacion->estado) === 'disponible' ? 'selected' : '' }}>
                                Disponible
                            </option>
                            <option value="ocupada" {{ old('estado', $habitacion->estado) === 'ocupada' ? 'selected' : '' }}>
                                Ocupada
                            </option>
                            <option value="reservada" {{ old('estado', $habitacion->estado) === 'reservada' ? 'selected' : '' }}>
                                Reservada
                            </option>
                            <option value="mantenimiento" {{ old('estado', $habitacion->estado) === 'mantenimiento' ? 'selected' : '' }}>
                                Mantenimiento
                            </option>
                        </select>

                        @error('estado')
                            <span class="text-error text-sm mt-1">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Imagen --}}
                    <div class="form-control mb-6">

                        <label for="imagen" class="label">
                            <span class="label-text font-semibold">
                                URL de la imagen
                            </span>
                        </label>

                        <input
                            type="text"
                            id="imagen"
                            name="imagen"
                            value="{{ old('imagen', $habitacion->imagen) }}"
                            class="input input-bordered w-full @error('imagen') input-error @enderror"
                        >

                        @error('imagen')
                            <span class="text-error text-sm mt-1">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Botones --}}
                    <div class="flex justify-end gap-3">

                        <a
                            href="{{ route('habitacions.show', $habitacion) }}"
                            class="btn btn-ghost"
                        >
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            💾 Guardar cambios
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection