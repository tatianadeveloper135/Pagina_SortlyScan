<<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SortlyScan</title>

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

    <!-- CSS -->
    <link rel="stylesheet" href="CSS/Centros.css">
</head>

<body>

<header>🌱 SortlyScan</header>

<div class="controls">
    <button onclick="miUbicacion()">📍 Mi ubicación</button>
    <input type="text" id="busqueda" placeholder="Buscar centro...">
    <button onclick="buscar()">Buscar</button>
</div>

<div class="main">
    <div id="map"></div>
    <div class="cards" id="cards"></div>
</div>

<!-- JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="JS/Centros.js"></script>

</body>
</html>
