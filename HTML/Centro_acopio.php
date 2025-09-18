<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Centros de Acopio</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
  <link rel="stylesheet" href="CSS/Centro.css">
</head>
<body>

<nav class="navbar">
    <div class="flex items-center space-x-2">
        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
          <span class="text-2xl"><img src="Imágenes/Logo circular.png" alt=""></span>
        </div>
          <span class="text-white text-2xl font-bold">SortlyScan</span>
    </div>
    <ul id="nav-links">
      <li><a href="menu.php">Inicio</a></li>
      <li><a href="premios.php">Premios y recompensas</a></li> <!-- Conexión IA -->
      <li><a href="premios.php">Premios y recompensas</a></li>
      <li><a href="Centro_acopio.php">Centros de acopio</a></li>
      <li><a href="videosedu.php">Vídeos educativos</a></li>
    </ul>
  </nav>

<header>Centros de Acopio - La Libertad</header>
<div class="controls">
  <button onclick="usarMiUbicacion()"> Usar mi ubicación</button>
  <input type="text" id="buscador" placeholder="Buscar centro por nombre">
  <button onclick="buscarCentro()">Buscar</button>
</div>

<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="JS/Centro.js"></script>

<!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 ">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 ">
                <div class="text-center">
                    <h3 class="text-xl font-bold mb-4">SortlyScan</h3>
                    <p class="text-gray-400">Transformando el mundo a través de la educación ambiental y la separación responsable de residuos.</p>
                </div>
                <div class="text-center">
                    <h4 class="font-semibold mb-4">Contacto</h4>
                    <a href="Home_pw.php"><p class="text-gray-400 mb-2">📧 SortlyScan.com</p></a>
                    <p class="text-gray-400 mb-2">sortlyscan_sv</p>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-bold mb-4">Dirección</h3>
                    <p class="text-gray-400">Centro Supérate Merlet, Calle Circunvalacion, Antiguo Cuscatlán, El Salvador</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 SortlyScan. Todos los derechos reservados. 🌱</p>
            </div>
        </div>
<script src="https://cdn.tailwindcss.com"></script>
<script src="JS/Centro.js"></script>
</body>
</html>
