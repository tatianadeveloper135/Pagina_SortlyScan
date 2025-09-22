<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio de Sesión</title>
  <link rel="stylesheet" href="CSS/inicio_sesion.css">

</head>
<body>
 
  <div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form id="form-login" >
      <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
      </div>
      <button type="submit">Ingresar</button>
      <div class="register-link">
        ¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>
      </div>
    </form>
  </div>

  <script src="JS/inicio_sesion.js"></script>
</body>
</html>