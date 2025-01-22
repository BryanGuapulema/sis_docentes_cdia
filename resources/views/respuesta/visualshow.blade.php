<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            Respuestas de la Encuesta: {{ $encuesta->nombre_encuesta }}
        </h2>
    </x-slot>
            <div class="py-12 bg-gray-50">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow-xl sm:rounded-lg p-8 border-t-4 border-blue-500">
                        <div class="flex items-center justify-between mb-6">
            <!-- Título -->
            <h3 class="text-2xl font-bold text-white-600">Resultados de la encuesta</h3>
            
            <!-- Botón para generar el PDF -->
            <button onclick="generarPDF()" class="flex items-center px-4 py-2 font-bold rounded-md text-white bg-gray-800 hover:bg-gray-700 transition-all duration-300">
                Descargar
            </button>
        </div>
                @foreach ($encuesta->preguntas as $index => $pregunta)
                    <div class="mb-12 bg-gray-100 p-6 rounded-lg shadow-md">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4">{{ $pregunta->enunciado }}</h4>

                        <!-- Contenedor de gráfico y leyenda de votos -->
                        <div class="flex justify-center gap-6 flex-wrap items-start">
                            <!-- Canvas de gráfico con tamaño ajustado -->
                            <div class="w-full sm:w-1/2 lg:w-1/2 flex justify-center bg-gray-50 p-4 rounded-lg shadow-md">
                                <canvas id="chart-{{ $pregunta->id }}" class="w-full" style="height: 530px; width: 357px; display: block; box-sizing: border-box;"></canvas>
                            </div>

                            <!-- Cuadro con los votos decorado y más pequeño -->
                            <div class="w-full sm:w-1/2 lg:w-1/2 pl-8 pr-4 mt-4 sm:mt-0">
                                <div class="space-y-4 bg-gray-200 p-4 rounded-lg shadow-lg">
                                    <p class="text-lg font-medium text-gray-700">Recuento de votos</p>
                                    @foreach ($chartData[$index]['answers'] as $opcion => $votos)
                                        <div class="flex items-center space-x-2">
                                            <!-- Color de segmento -->
                                            <div class="w-5 h-5 rounded-full" style="background-color: {{ $chartColors[$loop->index % count($chartColors)] }};"></div>
                                            <!-- Texto con votos -->
                                            <span class="text-gray-600 text-sm font-medium">{{ $opcion }} = <span class="text-gray-800 font-bold">{{ $votos }}</span> votos</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <a href="{{ route('encuestas.index') }}" class="block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Volver a las encuestas
                </a>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @foreach ($encuesta->preguntas as $index => $pregunta)
                const ctx{{ $pregunta->id }} = document.getElementById('chart-{{ $pregunta->id }}').getContext('2d');
                const chart{{ $pregunta->id }} = new Chart(ctx{{ $pregunta->id }}, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode(array_keys($chartData[$index]['answers'])) !!}, // Opciones como etiquetas
                        datasets: [{
                            label: 'Votos',
                            data: {!! json_encode(array_values($chartData[$index]['answers'])) !!}, // Recuento de votos
                            backgroundColor: {!! json_encode($chartColors) !!},
                            borderColor: {!! json_encode($chartColors) !!},
                            borderWidth: 1,
                            borderRadius: 5 // Bordes redondeados
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                beginAtZero: true,
                                ticks: {
                                    font: {
                                        size: 14
                                    }
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    font: {
                                        size: 14
                                    }
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: true, 
                                position: 'top', 
                                labels: {
                                    font: {
                                        size: 12 
                                    },
                                    boxWidth: 10 
                                }
                            }
                        }
                    }
                });
            @endforeach
        });

        function generarPDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        let yOffset = 10; 

        // Estilo general del documento
        doc.setFont("helvetica", "normal");
        doc.setTextColor(0, 51, 102);  // Azul oscuro para el texto

        // Título del documento
        doc.setFontSize(14);
        doc.setFont("helvetica", "bold");
        doc.text("Reporte de Encuesta", 10, yOffset);
        yOffset += 15;

        // Información general de la encuesta
        const info = [
            { label: "Nombre de la Asignatura", value: "{{ $encuesta->asignatura->nombre_asignatura ?? 'N/A' }}" },
            { label: "Nombre Encuesta", value: "{{ $encuesta->nombre_encuesta }}" },
            { label: "Fecha Creación", value: "{{ \Carbon\Carbon::parse($encuesta->created_at)->format('d/m/Y') }}" },
            { label: "Creado Por", value: "{{ $encuesta->docente->user->name ?? 'N/A' }}" },
            { label: "Enlace Encuesta", value: "{{ $encuesta->enlace_encuesta }}" }
        ];

        
        info.forEach(item => {
            doc.setFontSize(10);
            doc.setFont("helvetica", "bold");
            doc.text(item.label + ": ", 10, yOffset);
            doc.setFont("helvetica", "normal");
            doc.setTextColor(0, 51, 102);  // Azul claro para el valor
            doc.text(item.value, 60, yOffset);
            yOffset += 10;
        });

        yOffset += 15;  // Espacio antes de las preguntas

        // Preguntas y respuestas
        @foreach ($encuesta->preguntas as $index => $pregunta)
            const canvas{{ $pregunta->id }} = document.getElementById('chart-{{ $pregunta->id }}');
            const imgData{{ $pregunta->id }} = canvas{{ $pregunta->id }}.toDataURL('image/png');

            doc.setFontSize(12);
            doc.setFont("helvetica", "bold");
            doc.text("Pregunta: ", 10, yOffset);
            doc.setFont("helvetica", "normal");
            doc.setTextColor(0, 51, 102);  // Azul claro
            doc.text("{{ $pregunta->enunciado }}", 30, yOffset);
            yOffset += 15;

            // Recuento de votos
            doc.setFontSize(12);
            doc.setFont("helvetica", "bold");
            doc.text("Recuento de votos:", 10, yOffset);
            yOffset += 10;

            // Opciones de votos
            doc.setFont("helvetica", "normal");
            @foreach ($chartData[$index]['answers'] as $opcion => $votos)
                doc.text("{{ $opcion }} = {{ $votos }} votos", 10, yOffset);
                yOffset += 6;
            @endforeach

            // Comprobación de espacio antes de añadir una nueva página
            if (yOffset + 140 > doc.internal.pageSize.height) {
                doc.addPage(); 
                yOffset = 10;  
            }

            // Insertar imagen de gráfico
            doc.addImage(imgData{{ $pregunta->id }}, 'PNG', 10, yOffset, 160, 100);
            yOffset += 120; 
        @endforeach

        // Guardar el PDF generado
        doc.save('reporte_con_graficos.pdf');
    }
    </script>
    <!-- CSS para impresión -->
    <style>
        @media print {
            
            canvas {
                width: 357px !important;  
                height: 530px !important; 
            }

            
            .chart-container {
                max-width: 600px; 
                margin: 0 auto;   
            }
        }
    </style>
</x-app-layout>
