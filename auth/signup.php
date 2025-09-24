<?php
session_start();
header("Content-Type: application/json; charset=utf-8");
require_once("../config/conexion.php");

if (
    !empty($_POST['correo']) &&
    !empty($_POST['nombre']) &&
    !empty($_POST['fecha']) &&
    !empty($_POST['contrasena'])
) {
    $correo = trim($_POST['correo']);
    $nombre = trim($_POST['nombre']);
    $fecha = $_POST['fecha'];  
    $contrasena = $_POST['contrasena'];

    // Validar email
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["error" => "Correo electrónico inválido."]);
        exit();
    }

    // Validar fecha formato YYYY-MM-DD
    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $fecha)) {
        echo json_encode(["error" => "Fecha de nacimiento inválida."]);
        exit();
    }

    $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

    $database = new Database();
    $db = $database->getConnection();

    // Chequear si correo ya existe
    $query = "SELECT * FROM usuarios WHERE Correo_electronico = :correo";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":correo", $correo);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo json_encode(["error" => "El correo electrónico ya está registrado."]);
        exit();
    }

    // Insertar usuario nuevo
    $query = "INSERT INTO usuarios (Nombre_completo, Fecha_nacimiento, Correo_electronico, Contrasena) 
              VALUES (:nombre, :fecha, :correo, :contrasena)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":fecha", $fecha);
    $stmt->bindParam(":correo", $correo);
    $stmt->bindParam(":contrasena", $hashed_password);

    if ($stmt->execute()) {
        $id_usuario = $db->lastInsertId();

        // Guardar en sesión
        $_SESSION['usuario'] = [
            "id" => $id_usuario,
            "nombre" => $nombre,
            "correo" => $correo
        ];
        $_SESSION['LAST_ACTIVITY'] = time();

        echo json_encode([
            "mensaje" => "Usuario creado y sesión iniciada.",
            "usuario" => $_SESSION['usuario']
        ]);
    } else {
        echo json_encode(["error" => "Error al crear el usuario."]);
    }
} else {
    echo json_encode(["error" => "Datos incompletos."]);
}
