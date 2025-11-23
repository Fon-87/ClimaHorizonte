<!DOCTYPE html>
<html>
<head>
   <style>
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
<body style="background-image: url('{{ asset('images/ClimaHorizonte.png') }}');
             background-size: cover;
             background-position: center;
             height: 100vh;
             margin: 0;
             display: flex;
             justify-content: center;
             align-items: center;
             position: relative;">
             
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

