<!DOCTYPE html>
<html>
<head>
    <title>ClimaHorizonte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="{{ asset('css/styles.css') }}"> 
</head>
<body class="{{ $weatherClass }} text-ligth">

  <!-- Contenedor de lluvia (solo se verá si $weatherClass = 'weather-rainy') -->
  @if($weatherClass=== 'weather-rainy')  <div class="rain">
    @for ($i = 0; $i < 100; $i++)
        <span style="left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 1000) / 1000 }}s; animation-duration: {{ rand(500, 1500) / 1000 }}s;"></span>
    @endfor
    </div>
    @endif

   <!-- Contenedor de nublado (solo se verá si $weatherClass = 'weather-cloudy') -->
    @if($weatherClass === 'weather-cloudy')
  <div class="clouds">
    <span class="small"></span>
    <span class="medium"></span>
    <span class="large"></span>
  </div>
@endif
   <!-- Contenedor de tormenta (solo se verá si $weatherClass = 'weather-stormy') -->
    @if($weatherClass === 'weather-stormy')
    <div class="storm"></div>
    @endif

   <!-- Contenedor de nieve (solo se verá si $weatherClass = 'weather-snowy') -->
    @if($weatherClass === 'weather-snowy')
  <div class="snow">
    @for ($i = 0; $i < 20; $i++)
      <span style="left:{{ rand(0,100) }}%; animation-delay:{{ $i * 0.5 }}s;"></span>
    @endfor
  </div>
@endif
   <!-- Contenedor de nieve (solo se verá si $weatherClass = 'weather-sunny') -->
    @if($weatherClass === 'weather-sunny')
  <div class="sun"></div>
@endif
    <div class="container mt-5">
        <div class="card shadow-sm bg-dark text-white">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Tiempo en {{ $data['location']['name'] ?? 'Ciudad desconocida' }}</h2>
            </div>
            <div class="card-body">
                @if(isset($data['current']))
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="{{ $data['current']['condition']['icon'] }}" alt="icono clima" class="mb-3 weather-icon">
                            <h4>{{ $data['current']['condition']['text'] }}</h4>
                        </div>
                        <div class="col-md-8">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>País:</strong> {{ $data['location']['country'] }}</li>
                                <li class="list-group-item"><strong>Comunidad Autónoma o Región:</strong> {{ $data['location']['region'] }}</li>
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
