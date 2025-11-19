<!DOCTYPE html>
<html>
<head>
    <title>Resultado del clima</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Clima en {{ $data['location']['name'] ?? 'Ciudad desconocida' }}</h2>
            </div>
            <div class="card-body">
                @if(isset($data['current']))
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="{{ $data['current']['condition']['icon'] }}" alt="icono clima" class="img-fluid mb-3">
                            <h4>{{ $data['current']['condition']['text'] }}</h4>
                        </div>
                        <div class="col-md-8">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Hora local:</strong> {{ $data['location']['localtime'] }}</li>
                                <li class="list-group-item"><strong>Temperatura:</strong> {{ $data['current']['temp_c'] }} °C</li>
                                <li class="list-group-item"><strong>Sensación térmica:</strong> {{ $data['current']['feelslike_c'] }} °C</li>
                                <li class="list-group-item"><strong>Viento:</strong> {{ $data['current']['wind_kph'] }} km/h</li>
                                <li class="list-group-item"><strong>Humedad:</strong> {{ $data['current']['humidity'] }} %</li>
                                <li class="list-group-item"><strong>Presión:</strong> {{ $data['current']['pressure_mb'] }} mb</li>
                                <li class="list-group-item"><strong>Índice UV:</strong> {{ $data['current']['uv'] }}</li>
                                <li class="list-group-item"><strong>Precipitación:</strong> {{ $data['current']['precip_mm'] }} mm</li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        No se pudo obtener el clima.
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
