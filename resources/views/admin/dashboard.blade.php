<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" type="image/png">

        <title>SISTEMA DE SEGUIMIENTO DOCENTE</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                @import url('https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css');
            </style>
        @endif
    </head>

    <x-app-layout>

        <x-slot name="header" class="bg-gray-800">
            <h2 class="text-white text-center font-semibold text-xl leading-tight">
                Bienvenido, Admin
            </h2>
        </x-slot>

        <div class="bg-gray-200 max-w-7xl mx-auto sm:px-6 lg:px-8 py-8"> 
            <!-- Bloque 1-->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-center text-2xl font-bold py-4">Gestionar roles</h2>

                <div class="flex items-center justify-center">
                    <div class="text-center bg-gray-800 border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-white text-xl font-semibold mb-4">Gestionar Roles</h3>
                        <p class="text-white mb-4">Administra roles de todos los usuarios del sistema.</p>
                        <a href="{{ route('admin.users.index') }}" 
                            class="inline-flex items-center px-6 py-2 bg-gray-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                            <img src="{{ asset('images/Gestionar.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 mr-2">
                        </a>
                    </div>
                </div>                
            </div>  

            <!-- Bloque 2: Cursos, Docentes y Asignaturas -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Lista de cursos, docentes y asignaturas</h2>
                <div class="flex items-center justify-center">

                    <!-- Tarjeta 2: Cursos -->
                    <div class="text-center bg-gray-800 border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-white text-xl font-semibold mb-4">Cursos</h3>
                        <p class="text-white mb-4">Accede a la lista completa de cursos disponibles.</p>
                        <a href="{{ route('cursos.index') }}" 
                            class="inline-flex items-center px-6 py-2 bg-gray-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                            <img src="{{ asset('images/cursos.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 mr-2">
                        </a>
                    </div>   

                    <!-- Tarjeta 3: Docentes -->
                    <div class="text-center bg-gray-800 border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-white text-xl font-semibold mb-4">Docentes</h3>
                        <p class="text-white mb-4">Gestiona la información de los docentes en el sistema.</p>
                        <a href="{{ route('docentes.index') }}" 
                            class="inline-flex items-center px-6 py-2 bg-gray-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                            <img src="{{ asset('images/Docentes.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 mr-2">
                        </a>
                    </div>

                    <!-- Tarjeta 4: Asignaturas -->
                   <div class="text-center bg-gray-800 border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-white text-xl font-semibold mb-4">Asignaturas</h3>
                        <p class="text-white mb-4">Consulta y administra todas las asignaturas de un docente.</p>
                        <a href="{{ route('asignaturas.index') }}" 
                            class="inline-flex items-center px-6 py-2 bg-gray-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                            <img src="{{ asset('images/Asignaturas.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 mr-2">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bloque 3: Encuestas -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Encuestas de los docentes</h2>
                <div class="flex items-center justify-center">
                    <!-- Tarjeta 5: Encuestas -->
                    <div class="text-center bg-gray-800 border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-white text-xl font-semibold mb-4">Encuestas</h3>
                        <p class="text-white mb-4">Administra y consulta todas las encuestas del sistema.</p>
                        <a href="{{ route('encuestas.index') }}" 
                            class="inline-flex items-center px-6 py-2 bg-gray-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                            <img src="{{ asset('images/encuestas.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 mr-2">
                        </a>
                    </div> 
                </div>
            </div>


            <!-- Bloque 3.2: Encuestas -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Reportes de los docentes</h2>
                <div class="flex items-center justify-center">
                    <!-- Tarjeta 5.2: Encuestas -->
                    <div class="text-center bg-gray-800 border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-white text-xl font-semibold mb-4">Reportes</h3>
                        <p class="text-white mb-4">Administra y consulta los reportes del sistema.</p>
                        <a href="{{ route('reportes.form') }}" 
                            class="inline-flex items-center px-6 py-2 bg-gray-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                            <img src="{{ asset('images/Informes.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 mr-2">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bloque 4: Preguntas y Opciones -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Preguntas y opciones</h2>
                <div class="flex items-center justify-center">

                    <!-- Tarjeta 6: Preguntas -->
                    <div class="text-center bg-gray-800 border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-white text-xl font-semibold mb-4">Preguntas</h3>
                        <p class="text-white mb-4">Administra y crea las preguntas del sistema.</p>
                        <a href="{{ route('preguntas.index') }}" 
                            class="inline-flex items-center px-6 py-2 bg-gray-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                            <img src="{{ asset('images/preguntas.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 mr-2">
                        </a>
                    </div>
                    
                    <!-- Tarjeta 8: Opciones -->
                      <div class="text-center bg-gray-800 border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-white text-xl font-semibold mb-4">Opciones de respuesta</h3>
                        <p class="text-white mb-4">Gestiona de forma general las opciones de respuesta.</p>
                        <a href="{{ route('opciones.index') }}" 
                            class="inline-flex items-center px-6 py-2 bg-gray-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                            <img src="{{ asset('images/opciones.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 mr-2">
                        </a>
                    </div>
                    <!-- Tarjeta 9: Pregunta-Opción -->
                    <div class="text-center bg-gray-800 border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-white text-xl font-semibold mb-4">Asignar opciones a preguntas</h3>
                        <p class="text-white mb-4">Asocia opciones específicas a preguntas.</p>
                        <a href="{{ route('pregunta-opcions.index') }}" 
                            class="inline-flex items-center px-6 py-2 bg-gray-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                            <img src="{{ asset('images/pregunta-opcion.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 mr-2">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bloque 5: Lista de Preguntas y Respuestas -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Lista de preguntas y respuestas de usuarios</h2>
                <div class="flex items-center justify-center">
                    <!-- Tarjeta 7: Lista de Preguntas -->
                    <div class="text-center bg-gray-800 border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-white text-xl font-semibold mb-4">Lista de preguntas</h3>
                        <p class="text-white mb-4">Consulta las preguntas incluidas en cada encuesta.</p>
                        <a href="{{ route('encuesta-pregunta.index') }}" 
                            class="inline-flex items-center px-6 py-2 bg-gray-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                            <img src="{{ asset('images/preguntas-encuesta.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 mr-2">
                        </a>
                    </div>

                    <!-- Tarjeta 10: Respuestas -->
                   <div class="text-center bg-gray-800 border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-white text-xl font-semibold mb-4">Respuestas de usuarios</h3>
                        <p class="text-white mb-4">Consulta las respuestas de los usuarios a las encuestas.</p>
                        <a href="{{ route('respuestas.index') }}" 
                            class="inline-flex items-center px-6 py-2 bg-gray-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                            <img src="{{ asset('images/respuesta.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 mr-2">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</html>