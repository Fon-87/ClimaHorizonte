<!DOCTYPE html>
<html>
<head>
    <style>
  /* Fondo animado: cielo que cambia suavemente */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(to top, #f39c12, #f1c40f, #87ceeb);
            animation: skyShift 10s infinite alternate;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        @keyframes skyShift {
            0% { background: linear-gradient(to top, #f39c12, #f1c40f, #87ceeb); }
            100% { background: linear-gradient(to top, #ff6f61, #f9d423, #3498db); }
        }

        /* Sol animado */
        .sun {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, #f1c40f 40%, #f39c12 70%);
            border-radius: 50%;
            box-shadow: 0 0 60px #f39c12;
            animation: pulse 4s infinite;
            z-index: 2;
            opacity: 0.9;
        }

        @keyframes pulse {
            0% { transform: translateX(-50%) scale(1); }
            50% { transform: translateX(-50%) scale(1.1); }
            100% { transform: translateX(-50%) scale(1); }
        }

        /* Rayos del sol */
        .sun::before,
        .sun::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            background: radial-gradient(circle, rgba(241,196,15,0.3) 40%, transparent 70%);
            animation: rays 6s infinite linear;
        }

        .sun::after {
            width: 350px;
            height: 350px;
            animation-delay: 3s;
        }

        @keyframes rays {
            from { transform: translate(-50%, -50%) rotate(0deg); }
            to   { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Estilo del contenedor del formulario */
        .form-container {
            z-index: 2;
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }
</style>
    <title>ClimaHorizonte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Sol animado -->
    <div class="sun"></div>

<!--Contenedor del formulario-->
    <div class="form-container">
        <h1 class="mb-4 text-center">Consulta el tiempo con ClimaHorizonte</h1>
        <form action="{{ url('/weather-result') }}" method="POST" class="card p-4 shadow-sm">
            @csrf
            <div class="mb-3">
                <label for="pais" class="form-label">País:</label>
                <input type="text" name="pais" id="pais" class="form-control" required>
                <label for="region" class="form-label">Comunidad Autónoma o Región:</label>
                <input type="text" name="region" id="region" class="form-control" required>
                <label for="city" class="form-label">Ciudad:</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

