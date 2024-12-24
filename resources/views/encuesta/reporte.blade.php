<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reporte de Respuestas de Encuestas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    @foreach ($encuestasConRespuestas as $encuesta)
                        <div class="mb-8">
                            <!-- Detalles de la Encuesta -->
                            <div class="mb-4">
                                <p class="font-semibold text-lg text-gray-900">Nombre de la Asignatura: <span class="font-normal">{{ $encuesta->asignatura->nombre_asignatura ?? 'N/A' }}</span></p>
                                <p class="font-semibold text-lg text-gray-900">Nombre Encuesta: <span class="font-normal">{{ $encuesta->nombre_encuesta }}</span></p>
                                <p class="font-semibold text-lg text-gray-900">Fecha Creación: <span class="font-normal">{{ \Carbon\Carbon::parse($encuesta->created_at)->format('d/m/Y') }}</span></p>
                                <p class="font-semibold text-lg text-gray-900">Creado Por: <span class="font-normal">{{ $encuesta->docente->user->name ?? 'N/A' }}</span></p>
                                <p class="font-semibold text-lg text-gray-900">Enlace Encuesta: <span class="font-normal text-blue-600"><a href="{{ route('encuestas.responder', $encuesta->uuid) }}" target="_blank">{{ route('encuestas.responder', $encuesta->uuid) }}</a></span></p>
                            </div>

                            <!-- Tabla de Preguntas y Respuestas -->
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Pregunta</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Respuestas</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($encuesta->preguntas as $pregunta)
                                        <tr>
                                            <td class="px-3 py-4 text-sm text-gray-500">{{ $pregunta->enunciado }}</td>
                                            <td class="px-3 py-4 text-sm text-gray-500">
                                                <ul class="list-disc pl-6">
                                                    @foreach($pregunta->respuestas as $respuesta)
                                                        <li>{{ $respuesta->opcion->opcion }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
