<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Usuario</title>
  <link rel="stylesheet" href="CSS/registro.css">

</head>
<body>
 
  <div class="register-container">
    <h2>Registrarse</h2>
    <form id="form-registro">
      <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
      </div>
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="usuario" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="fecha">Fecha de nacimiento:</label>
        <input type="date" id="fecha" name="fecha" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
      </div>
      <button type="submit">Ingresar</button>
    </form>
    <div class="login-link">
      ¿Ya tienes una cuenta? <a href="inicio_sesion.php">Inicia sesión</a>
    </div>
  </div>

  <script src="JS/registro.js"></script>
</body>
</html>