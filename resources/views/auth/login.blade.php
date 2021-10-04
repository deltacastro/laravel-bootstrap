@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-center align-items-center h-100 bg-gray-200">
        <div class="card shadow-lg col-11 col-md-8 col-lg-6 col-xl-4">
            <form method="POST" action="{{ route('login') }}" class="card-body text-gray-700 fw-bold">
                <div class="col mb-4 d-flex flex-wrap justify-content-center">
                    <img class="img-fluid px-5 my-3 col-12" src="{{ asset('images/logo.png') }}" alt="" style="width: 60%;">
                    <h4 class="fw-bold text-center text-gray-800 col-12">Iniciar Sesión</h4>
                </div>
                @csrf
                <!-- Email Address -->
                <x-form.float.input type="email" class="text-gray-800 fw-bold" label="Correo" id="correo"
                    name="email" error-validator="email" value="{{ old('email') }}"/>

                <!-- Password -->
                <x-form.float.input type="password" class="text-gray-800 fw-bold" label="Contraseña" id="password"
                    name="password" error-validator="password"/>

                <!-- Remember Me -->
                <div class="d-block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">Recuerdame</span>
                    </label>
                </div>

                <div class="d-flex align-items-center justify-content-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            Recuperar contraseña
                        </a>
                    @endif

                    <x-button class="ms-3">
                        Iniciar sesión
                    </x-button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/select2.js') }}"></script>
    <script>
        $(function(){
            // $.fn.select2.defaults.set( {"theme", "bootstrap-5", selectionCssClass: "select2--large",} );
            $('#email').select2({
                theme: "bootstrap-5",
                containerCssClass: "select2--large", // For Select2 v4.0
            });
        })
    </script>
@endsection
