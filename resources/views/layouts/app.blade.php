<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-700 flex flex-col">
            <!-- Page Heading -->
            @livewire('navigation-menu')

            <a
                href="{{ route(Auth::user()->hasRole('admin') ? 'admin.dashboard' : (Auth::user()->hasRole('docente') ? 'docente.dashboard' : 'estudiante.dashboard')) }}"
                class="flex items-center justify-center bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 transition-all duration-300">
                Dashboard
            </a>

            @if (isset($header))
                <header class="bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="bg-gray-200 flex-grow">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-gray-500 py-4">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                    &copy; {{ date('Y') }} Sistema de Seguimiento Docente. Todos los derechos reservados.
                </div>
            </footer>
        </div>

        @stack('modals')

        @livewireScripts
    </body>

</html>
