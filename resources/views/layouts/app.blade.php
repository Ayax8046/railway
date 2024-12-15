<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Cambiar el título de la pestaña -->
    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- Cambiar el favicon -->
    <link rel="icon" href="{{ asset('images/logo_caja.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CODIGO DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Estilos de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Scripts de jQuery y DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- APEXCHARTS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- @vite('resources/css/app.css')
    @vite('resources/js/app.js') --}}



    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- Esto asegura que los archivos generados por Vite se sirvan sobre HTTPS -->
    {{-- @if (app()->environment('production'))
        <script>
            // Asegurarse de que los archivos generados por Vite usen HTTPS
            const manifest = @json(@mix('/build/manifest.json'));
            const versionedCSS = manifest['resources/css/app.css'] ?? '';
            const versionedJS = manifest['resources/js/app.js'] ?? '';
            document.head.insertAdjacentHTML('beforeend',
                `<link rel="stylesheet" href="https://${window.location.host}/${versionedCSS}">`);
            document.body.insertAdjacentHTML('beforeend', `<script src="https://${window.location.host}/${versionedJS}">
        </script>`);
        </script>
    @endif --}}
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
