<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        @yield('head')
        @stack('yield')
    </head>
    <body>
        <main>
            @auth
                @include('layouts.sidebar.index')
            @endauth
            <div class="col" style="overflow-y: auto;">
                @auth
                    @include('layouts.navbar.index')
                @endauth
                @yield('content')
            </div>

            @include('layouts.toast.index')
            @yield('extra_divs')
            @stack('extra_divs')
        </main>
        <script src="{{ asset('js/bootstrap5.js') }}"></script>
        <script src="{{ asset('js/select2.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const loadingAjax = `
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">

                    </div>
                    </br>
                    <span class=""></span>
                </div>
            `
        </script>
        @yield('javascript')
        @stack('javascript')
    </body>
</html>
