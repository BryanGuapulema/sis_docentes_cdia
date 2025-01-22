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
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-center text-white leading-tight">
                {{ __('Asignar opciones a preguntas') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center">
                            <div class="flex items-center justify-between sm:flex-auto">
                                <h1 class="mt-2 font-semibold text-white">Lista de {{ __('preguntas y de opciones') }}</h1>
                                <img src="{{ asset('images/pregunta-opcion.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 ml-4">
                            </div>
                        </div>

                        <div class="flow-root">
                            <div class="mt-8 overflow-x-auto text-center">
                                <div class="inline-block min-w-full py-2 text-center rounded-lg align-middle bg-gray-500">
                                    <table class="w-full divide-y divide-gray-300 text-center">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">No</th>
                                            <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">Pregunta Id</th>
                                            <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">Enunciado</th>
                                            <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">Opción</th>
                                            <th scope="col" class="px-3 py-3 text-l font-semibold uppercase tracking-wide text-white">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($preguntaOpcions as $preguntaOpcion)
                                            <tr class="even:bg-gray-50">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $preguntaOpcion->pregunta_id }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $preguntaOpcion->pregunta->enunciado }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $preguntaOpcion->opcion->opcion }}</td>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                    <form action="{{ route('pregunta-opcions.destroy', $preguntaOpcion->id) }}" method="POST" class="flex justify-center">
                                                        <a href="{{ route('pregunta-opcions.show', $preguntaOpcion->id) }}" 
                                                            class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                                            <img src="{{ asset('images/mostrar.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                                            {{ __('Mostrar') }}
                                                        </a>
                                                        <a href="{{ route('pregunta-opcions.edit', $preguntaOpcion->id) }}" 
                                                            class="flex items-center bg-gray-800 hover:bg-indigo-600 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                                            <img src="{{ asset('images/editar.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                                            {{ __('Editar') }}
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('pregunta-opcions.destroy', $preguntaOpcion->id) }}" 
                                                            class="flex items-center bg-gray-800 hover:bg-red-600 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2" onclick="event.preventDefault(); confirm('¿Esta seguro que desea eliminarlo?') ? this.closest('form').submit() : false;">
                                                            <img src="{{ asset('images/eliminar.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                                            {{ __('Eliminar') }}
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    <div class="mt-4 px-4">
                                        {!! $preguntaOpcions->withQueryString()->links() !!}
                                    </div>

                                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                        <a type="button" href="{{ route('pregunta-opcions.create') }}" 
                                            class="inline-flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                            <img src="{{ asset('images/añadir.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">                                            
                                            Añadir nueva pregunta y opción
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</html>