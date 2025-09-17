<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SortlyScan</title>
    <link rel="stylesheet" href="CSS/home.css">
</head>
<body class="bg-gray-50">
    <!-- Encabezado -->
    <header class="gradient-bg text-white">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                    <span class="text-2xl"><img src="Imágenes/Logo circular.png" alt=""></span>
                </div>
                <span class="text-2xl font-bold">SortlyScan</span>
            </div>
            <div class="hidden md:flex space-x-6">
                <a href="#Inicio" class="hover:text-green-200 transition-colors">Inicio</a>
                <a href="#Funciones" class="hover:text-green-200 transition-colors">Funciones</a>
                <a href="#Reciclaje" class="hover:text-green-200 transition-colors">Reciclaje</a>
                <a href="inicio_sesion.html" class="hover:text-green-200 transition-colors">Iniciar Sesión</a>
            </div>
        </nav>
    </header>

    <!-- Sección inicio -->
    <section id="Inicio" class="gradient-bg text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Aprende a reciclar con <span class="text-green-200">SortlyScan</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-green-100">
                    La aplicación que te ayuda a reciclar correctamente, ganar puntos y cuidar el planeta
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="inicio_sesion.html"><button class="bg-white text-green-600 px-8 py-4 rounded-full font-semibold text-lg hover:bg-green-50 transition-colors pulse-animation">
                        Inicia sesión
                    </button></a>
                    <a href="#Funciones" class="hover:text-green-200 transition-colors"><button class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-green-600 transition-colors">
                       Ver más información
                    </button> </a>
            
                </div>
            </div>
        </div>
    </section>

    <!-- Funcionamiento -->
    <section id="Funciones" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">¿Cómo Funciona SortlyScan?</h2>
                <p class="text-xl text-gray-600">Tres pasos simples para un reciclaje efectivo:</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center card-hover bg-gray-50 p-8 rounded-2xl">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-4xl">📸</span>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">1. Escanea</h3>
                    <p class="text-gray-600">Toma una foto del objeto que quieres reciclar, subelo a la página web y nuestra IA lo identificará automáticamente</p>
                </div>
                
                <div class="text-center card-hover bg-gray-50 p-8 rounded-2xl">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-4xl">🎯</span>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">2. Aprende</h3>
                    <p class="text-gray-600">Recibe instrucciones precisas sobre dónde puedes llevar tu reciclaje. O accede a los vídeos de nuestra sección de aprendizaje.</p>
                </div>
                
                <div class="text-center card-hover bg-gray-50 p-8 rounded-2xl">
                    <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-4xl">⭐</span>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">3. Gana Puntos</h3>
                    <p class="text-gray-600">Acumula puntos por cada acción de reciclaje llenando un formulario y canjéalos por recompensas increíbles.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Info reciclaje -->
    <section id="Reciclaje" class="py-20 bg-green-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">¿Por qué utilizar SortlyScan?</h2>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl card-hover text-center">
                    <div class="text-4xl mb-4">🌍</div>
                    <h4 class="font-semibold text-gray-800 mb-2">Impacto Ambiental</h4>
                    <p class="text-gray-600 text-sm">Contribuye activamente a la conservación del planeta, el reciclaje reduce miles de toneladas de desechos diarios en el Salvador. También, puede considerarse una buena fuente de ingresos en casos de constancia.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl card-hover text-center">
                    <div class="text-4xl mb-4">🏆</div>
                    <h4 class="font-semibold text-gray-800 mb-2">Sistema de Recompensas</h4>
                    <p class="text-gray-600 text-sm">Gana puntos y desbloquea premios exclusivos en base a tus niveles de reciclaje, esto potencia el interes en mantener el hábito del reciclaje.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl card-hover text-center">
                    <div class="text-4xl mb-4">📍</div>
                    <h4 class="font-semibold text-gray-800 mb-2">Puntos de Reciclaje</h4>
                    <p class="text-gray-600 text-sm">Encuentra centros de reciclaje cerca de ti, conoce el valor de los productos en el mercado actual y sigue una guía de ubicación en tu recorrid hacia tu centro de destino.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl card-hover text-center">
                    <div class="text-4xl mb-4">👥</div>
                    <h4 class="font-semibold text-gray-800 mb-2">Comunidad</h4>
                    <p class="text-gray-600 text-sm">Únete a miles de eco-guerreros que como tú, se han comprometido con el proyecto. </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Iniciar sesión -->
    <section id="Iniciar_sesion" class="py-20 gradient-bg text-white">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl font-bold mb-6">¡Comienza tu viaje SortlyScan hoy!</h2>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                    <button class="bg-black text-white px-8 py-4 rounded-xl font-semibold flex items-center justify-center space-x-3 hover:bg-gray-800 transition-colors">
                        <div class="text-center">
                            <div class="text-xs">Empieza hoy:</div>
                            <div class="text-lg"><a href="registro.html">Reguistrarse</a></div>
                        </div>
                    </button>
                    
                    <a href="inicio_sesion.html"><button class="bg-black text-white px-8 py-4 rounded-xl font-semibold flex items-center justify-center space-x-3 hover:bg-gray-800 transition-colors">
                        <div class="text-center">
                            <div class="text-xs">O vuelve a la comunidad:</div>
                            <div class="text-lg"><a href="inicio_sesion.html">Iniciar sesión</a></div>
                        </div>
                    </button></a>
                </div>
                
                <p class="text-green-200">Expo 2025</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 ">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 ">
                <div class="text-center">
                    <h3 class="text-xl font-bold mb-4">SortlyScan</h3>
                    <p class="text-gray-400">Maneja residuos inteligentemente y ayuda a construir un futuro más verde.</p>
                </div>
                <div class="text-center">
                    <h4 class="font-semibold mb-4">Contacto</h4>
                    <a href="Home_pw.html"><p class="text-gray-400 mb-2">📧 SortlyScan.com</p></a>
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
    <script src="JS/home.js"></script>
</body>
</html>
