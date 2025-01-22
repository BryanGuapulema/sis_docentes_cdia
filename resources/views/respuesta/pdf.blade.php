<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Encuesta</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 30px;
            background-color: #ffffff;
            color: #333;
        }
        h1 {
            text-align: center;
            font-size: 30px;
            color: #2d3748;
            margin-bottom: 20px;
        }
        h3 {
            text-align: center;
            font-size: 24px;
            color: #4a5568;
            margin-bottom: 40px;
        }
        h4 {
            font-size: 20px;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .chart-container {
            width: 100%;
            margin: 30px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
        }
        th, td {
            padding: 12px;
            text-align: center;
            font-size: 14px;
            border-bottom: 1px solid #d1d5db;
        }
        th {
            background-color: #f7fafc;
            color: #2d3748;
            font-weight: bold;
        }
        td {
            background-color: #ffffff;
            color: #4a5568;
        }
        .details {
            margin: 30px 0;
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 20px;
        }
        .details h4 {
            margin-bottom: 20px;
            color: #4a5568;
        }
        .details p {
            margin: 8px 0;
            font-size: 16px;
            color: #333;
        }
        .details strong {
            color: #2d3748;
        }
    </style>
</head>
<body>

    <h1>Resultados de la encuesta</h1>
    <h3>{{ $encuesta->nombre_encuesta }}</h3>

    <!-- Detalles de la Encuesta -->
    <div class="details">
        <h4>Detalles de la encuesta</h4>
        <p><strong>Nombre de la asignatura:</strong> {{ $encuesta->asignatura->nombre_asignatura ?? 'N/A' }}</p>
        <p><strong>Nombre encuesta:</strong> {{ $encuesta->nombre_encuesta }}</p>
        <p><strong>Docente:</strong> {{ $encuesta->docente->user->name ?? 'N/A' }}</p>
        <p><strong>Fecha de creación:</strong> {{ \Carbon\Carbon::parse($encuesta->created_at)->format('d/m/Y') }}</p>
        <p><strong>Creado por:</strong> {{ $encuesta->docente->user->name ?? 'N/A' }}</p>
        <p><strong>Enlace de la encuesta:</strong> <a href="{{ $encuesta->enlace_encuesta }}" target="_blank">{{ $encuesta->enlace_encuesta }}</a></p>
    </div>

    <!-- Resultados de la Encuesta -->
    @foreach ($chartData as $index => $data)
        <div class="chart-container">
            <h4>{{ $data['question'] }}</h4>
            <table>
                <thead>
                    <tr>
                        <th>Respuestas</th>
                        <th>Votos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['answers'] as $option => $votes)
                        <tr>
                            <td>{{ $option }}</td>
                            <td>{{ $votes }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach

</body>
</html>
