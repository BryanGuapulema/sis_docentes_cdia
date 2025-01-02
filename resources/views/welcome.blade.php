<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SISTEMA DE SEGUIMIENTO DOCENTE</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* TailwindCSS fallback */
                @import url('https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css');
            </style>
        @endif
    </head>
    <body class="flex flex-col min-h-screen text-white antialiased bg-gray-800 shadow-lg">

        <header class="flex items-center bg-gray-500 py-4 px-5">
            <h1 class="text-2xl font-bold uppercase tracking-wide">
                Sistema de Seguimiento Docente
            </h1>
            @if (Route::has('login'))
                <nav class="flex flex-1 justify-end text-white">
                    @auth
                        <a
                            href="{{ route(Auth::user()->hasRole('admin') ? 'admin.dashboard' : (Auth::user()->hasRole('docente') ? 'docente.dashboard' : 'estudiante.dashboard')) }}"

                            class="text-white hover:underline px-4">
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="text-white hover:underline px-4"
                        >
                            Iniciar Sesión
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="text-white hover:underline px-4"
                            >
                                Registrarse                    
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="max-w-7xl mx-auto mt-8 px-4 sm:px-6 lg:px-8 flex-grow items">
            <section class="rounded-lg shadow-md p-8">                            
            
                <h1 class="text-2xl font-bold mb-2">
                    Bienvenido al Sistema de Seguimiento Docente
                </h1>                

                <div class="flex items-center">                    
                    <img src="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" alt="Descripción de la imagen" class=" h-20 w-auto">
                    <p class="text-lg leading-relaxed flex-1 p-6">
                        Este sistema está diseñado para facilitar el seguimiento y la evaluación del desempeño de los docentes.
                        Explore las herramientas disponibles y maximice la eficiencia de la gestión educativa.
                    </p>
                </div>


                <div class="grid gap-6 md:grid-cols-2">
                    <div class="bg-gray-500 rounded-lg p-6 shadow hover:shadow-lg transition flex items-center">
                                                
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Seguimiento docente</h3>
                            <p>
                                Crear encuestas únicas y personalizadas para cada clase.
                            </p>
                        </div>

                        <img src="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" alt="Imagen" class="h-12 rounded-lg">
                    </div>

                    <div class="bg-gray-500 rounded-lg p-6 shadow hover:shadow-lg transition flex items-center">
                                                
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Evaluación del personal</h3>
                            <p>
                            Completar encuestas sobre las clases y el desempeño del docente.
                            </p>
                        </div>

                        <img src="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" alt="Imagen" class="h-12 rounded-lg">
                    </div>

                    <div class="bg-gray-500 rounded-lg p-6 shadow hover:shadow-lg transition flex items-center">
                                                
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Informes y Resultados</h3>
                            <p>
                            Genere informes personalizados para monitorear el progreso y los resultados.
                            </p>
                        </div>

                        <img src="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" alt="Imagen" class="h-12 rounded-lg">
                    </div>

                    <div class="bg-gray-500 rounded-lg p-6 shadow hover:shadow-lg transition flex items-center">                                                
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Compresión de resultados</h3>
                            <p class="">
                                Ver estadísticas de las conexiones de docentes y estudiantes en un rango de fechas.
                            </p>  
                        </div>
                        <img src="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" alt="Imagen" class="h-12 rounded-lg">
                    </div>     
                    
                </div>
            </section>            
        </main>

        <!-- Footer -->
        <footer class="bg-gray-500 mt-12 py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                &copy; {{ date('Y') }} Sistema de Seguimiento Docente. Todos los derechos reservados.
            </div>
        </footer>

    </body>
</html>