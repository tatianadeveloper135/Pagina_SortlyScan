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
    <form id= "form_login" onsubmit="redirectToMenu(event)">
      <div class="form-group">
        <label for="usuario">Username:</label>
        <input type="text" id="usuario" name="usuario" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Password:</label>
        <input type="password" id="contrasena" name="contrasena" required>
      </div>
      <input type="submit" value="Entrar">
      <div class="register-link">
        ¿No tienes una cuenta? <a href="registro.html">Regístrate aquí</a>
      </div>
    </form>
  </div>

  <script src="JS/inicio_sesion.js"></script>
</body>
</html>