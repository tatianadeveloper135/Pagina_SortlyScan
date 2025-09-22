<?php

header("Content-Type: application/json");
require_once("../config/conexion.php");

// Verificamos que los datos necesarios estén presentes
if (
    !empty($_POST['correo']) &&
    !empty($_POST['nombre']) &&
    !empty($_POST['fecha']) &&
    !empty($_POST['contrasena'])
) {
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];  // Fecha de nacimiento
    $contrasena = $_POST['contrasena'];  // Contraseña

    // Validar el formato de correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["error" => "Correo electrónico inválido."]);
        exit();
    }

    // Validar el formato de fecha
    $fecha_formato_valido = preg_match("/^\d{4}-\d{2}-\d{2}$/", $fecha);  // Verifica formato YYYY-MM-DD
    if (!$fecha_formato_valido) {
        echo json_encode(["error" => "Fecha de nacimiento inválida. Debe estar en formato YYYY-MM-DD."]);
        exit();
    }

    // Encriptamos la contraseña
    $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

    // Establecemos la conexión con la base de datos
    $database = new Database();
    $db = $database->getConnection();

    // Consultamos si el correo electrónico ya está registrado
    $query = "SELECT * FROM usuarios WHERE Correo_electronico = :correo";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":correo", $correo);
    $stmt->execute();

    // Si el correo ya está registrado, no procedemos con la inserción
    if ($stmt->rowCount() > 0) {
        echo json_encode(["error" => "El correo electrónico ya está registrado."]);
        exit();
    }

    // Preparamos la consulta para insertar el nuevo usuario
    $query = "INSERT INTO usuarios (Nombre_completo, Fecha_nacimiento, Correo_electronico, Contrasena) 
              VALUES (:nombre, :fecha, :correo, :contrasena)";
    $stmt = $db->prepare($query);

    // Enlazamos los parámetros
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":fecha", $fecha);
    $stmt->bindParam(":correo", $correo);
    $stmt->bindParam(":contrasena", $hashed_password);

    // Ejecutamos la consulta
    if ($stmt->execute()) {
        echo json_encode(["mensaje" => "Usuario creado correctamente."]);
    } else {
        echo json_encode(["error" => "Error al crear el usuario."]);
    }
} else {
    echo json_encode(["error" => "Datos incompletos."]);
}
?>
