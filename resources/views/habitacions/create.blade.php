@extends('layouts.app')

@section('titulo', 'Nueva habitación')

@section('cabecera', 'Nueva habitación')

@section('contenido')

<div class="p-6">

    <div class="max-w-3xl mx-auto">

        <div class="card bg-base-100 shadow-xl border border-base-300">

            <div class="card-body">

                <h2 class="card-title text-2xl">
                    Registrar nueva habitación
                </h2>

                <p class="text-base-content/70 mb-4">
                    Completa la información de la habitación.
                </p>


                <form
                    action="{{ route('habitacions.store') }}"
                    method="POST"
                >

                    @csrf


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
                            value="{{ old('nombre') }}"
                            placeholder="Ejemplo: Habitación 101"
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
                            placeholder="Describe las características de la habitación..."
                            class="textarea textarea-bordered w-full @error('descripcion') textarea-error @enderror"
                        >{{ old('descripcion') }}</textarea>

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
                                value="{{ old('precio') }}"
                                placeholder="0"
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
                            value="{{ old('capacidad') }}"
                            placeholder="Ejemplo: 2"
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
                            <option value="" disabled selected>
                                Selecciona un estado
                            </option>
                            <option value="disponible" {{ old('estado') === 'disponible' ? 'selected' : '' }}>
                                Disponible
                            </option>
                            <option value="ocupada" {{ old('estado') === 'ocupada' ? 'selected' : '' }}>
                                Ocupada
                            </option>
                            <option value="reservada" {{ old('estado') === 'reservada' ? 'selected' : '' }}>
                                Reservada
                            </option>
                            <option value="mantenimiento" {{ old('estado') === 'mantenimiento' ? 'selected' : '' }}>
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
                            value="{{ old('imagen') }}"
                            placeholder="https://ejemplo.com/habitacion.jpg"
                            class="input input-bordered w-full @error('imagen') input-error @enderror"
                        >

                        <span class="text-xs text-base-content/60 mt-1">
                            Puedes dejar este campo vacío si no tienes una imagen.
                        </span>

                        @error('imagen')
                            <span class="text-error text-sm mt-1">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Botones --}}
                    <div class="flex justify-end gap-3">

                        <a
                            href="{{ route('habitacions.index') }}"
                            class="btn btn-ghost"
                        >
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            💾 Guardar habitación
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection