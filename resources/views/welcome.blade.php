@extends('layouts.app')

@section('titulo', 'Página principal')

@section('contenido')

    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content flex-col lg:flex-row-reverse">

            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold text-primary">
                    Bienvenido a SHotel
                </h1>

                <p class="py-6">
                    Sistema de gestión hotelera.
                    Administra habitaciones, reservas y minimarket
                    desde un solo lugar.
                </p>
            </div>

            <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">

                <div class="card-body">

                    <fieldset class="fieldset">

                        <label class="label">
                            Email
                        </label>

                        <input
                            type="email"
                            class="input input-bordered w-full"
                            placeholder="Email"
                        >

                        <label class="label">
                            Password
                        </label>

                        <input
                            type="password"
                            class="input input-bordered w-full"
                            placeholder="Password"
                        >

                        <div>
                            <a href="#" class="link link-hover">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>

                        <button class="btn btn-primary mt-4">
                            Iniciar sesión
                        </button>

                    </fieldset>

                </div>

            </div>

        </div>
    </div>
@endsection