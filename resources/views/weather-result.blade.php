<!DOCTYPE html>
<html>
<head>
    <title>Resultado del clima</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
      /*Fondo general*/ 
    body{
        margin:0;
        padding:0;
        transition: background 1s ease-in-out;/*suaviza el cambio de fondo*/
    }

    /* Fondo nublado */
.weather-cloudy {
    background: linear-gradient(to bottom, #95a5a6, #7f8c8d);
    position: relative;
    overflow: hidden;
}

/* Contenedor de nubes */
.clouds {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    pointer-events: none;
}

/* Cada nube */
.clouds span {
    position: absolute;
    background: #fff;
    border-radius: 50%;
    opacity: 0.9;
    animation: cloudMove 20s linear infinite;
    box-shadow: 0 0 20px rgba(255,255,255,0.6);
}

/* Tamaños base */
.clouds span.small { width: 80px; height: 50px; top: 20%; left: -120px; }
.clouds span.medium { width: 150px; height: 90px; top: 40%; left: -200px; }
.clouds span.large { width: 250px; height: 140px; top: 60%; left: -300px; }

/* Nubes compuestas con pseudo-elementos */
.clouds span::before,
.clouds span::after {
    content:"";
    position:absolute;
    background:#fff;
    border-radius:50%;
}

.clouds span.small::before { width:40px; height:40px; left:-20px; top:5px; }
.clouds span.small::after { width:50px; height:50px; left:40px; top:-10px; }

.clouds span.medium::before { width:80px; height:80px; left:-40px; top:10px; }
.clouds span.medium::after { width:100px; height:100px; left:60px; top:0; }

.clouds span.large::before { width:120px; height:120px; left:-60px; top:20px; }
.clouds span.large::after { width:140px; height:140px; left:100px; top:0; }

/* Animación */
@keyframes cloudMove {
    from { transform: translateX(-200px); }
    to   { transform: translateX(120vw); }
}


/*Fondo lluvioso*/
.weather-rainy {
    background: linear-gradient(to bottom, #3498db, #2980b9);
    position: relative;
    overflow: hidden;
}

/* Contenedor de lluvia */
.rain {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    pointer-events: none;
}

/* Cada gota */
.rain span {
    position: absolute;
    width: 2px;
    height: 15px;
    background: rgba(255,255,255,0.6);
    border-radius: 50%;
    animation: drop 1s linear infinite;
}

/* Animación de caída */
@keyframes drop {
    from { transform: translateY(-20px); opacity: 0; }
    50%  { opacity: 1; }
    to   { transform: translateY(100vh); opacity: 0; }
}

/* Fondo tormentoso */
.storm {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(255,255,255,0.1);
    animation: lightning 3s infinite;
}

@keyframes lightning {
    0%, 95% { opacity: 0; }
    96% { opacity: 1; background: rgba(255,255,255,0.8); }
    100% { opacity: 0; }
}
/* Fondo nevado */
.snow {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    pointer-events: none;
}

.snow span {
    position: absolute;
    width: 8px; height: 8px;
    background: #fff;
    border-radius: 50%;
    animation: snowFall 10s linear infinite;
}

@keyframes snowFall {
    from { transform: translateY(-10px); opacity: 0; }
    50%  { opacity: 1; }
    to   { transform: translateY(100vh); opacity: 0; }
}

/* Fondo soleado */
.weather-sunny {
    background: linear-gradient(to bottom, #f1c40f, #f39c12);
    position: relative;
    overflow: hidden
}


.sun {
    position: absolute;
    top: 10%; left: 50%;
    width: 100px; height: 100px;
    margin-left: -50px;
    background: radial-gradient(circle, #fff176 40%, transparent 70%);
    border-radius: 50%;
    animation: sunPulse 4s infinite alternate;
    z-index: 0;
}

@keyframes sunPulse {
    from { transform: scale(1); opacity: 0.8; }
    to   { transform: scale(1.2); opacity: 1; }
}

.container {
    position: relative;
    z-index: 1; /* el contenido queda encima */
}

/* Fondo noche despejada */
.weather-clear-night {
    background: linear-gradient(to bottom, #2c3e50, #000000);
    position: relative;
    overflow: hidden;
}

/* Estrellas */
.weather-clear-night::before {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-image: radial-gradient(circle, rgba(255,255,255,0.8) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: starsTwinkle 5s ease-in-out infinite alternate;
}

@keyframes starsTwinkle {
    from { opacity: 0.7; }
    to   { opacity: 1; }
}






</style>
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

   <!-- Contenedor de nieve (solo se verá si $weatherClass = 'weather-snowy') -->
    @if($weatherClass === 'weather-sunny')
  <div class="sun"></div>
@endif




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
                                <li class="list-group-item"><strong>País:</strong> {{ $data['location']['country'] }}</li>
                                <li class="list-group-item"><strong>Región:</strong> {{ $data['location']['region'] }}</li>
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
