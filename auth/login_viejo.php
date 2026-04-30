<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once("../config/conexion.php");

// Inicializamos variables
$correo = null;
$contrasena = null;

if (!empty($_POST)) {
    $correo = isset($_POST['correo']) ? trim($_POST['correo']) : null;
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;
} else {
   
}


// Si llegamos aquí, tenemos correo y contrasena: continuamos con la verificación
$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM usuarios WHERE Correo_electronico = :correo";
$stmt = $db->prepare($query);
$stmt->bindParam(":correo", $correo);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($contrasena, $user['Contrasena'])) {
    $_SESSION['usuario'] = [
        "id" => $user['ID_Usuario'],
        "nombre" => $user['Nombre_completo'],
        "correo" => $user['Correo_electronico']
    ];
    $_SESSION['LAST_ACTIVITY'] = time();
    echo json_encode([
        "mensaje" => "Inicio de sesión exitoso",
        "usuario" => $_SESSION['usuario']
    ]);
} else {
    echo json_encode(["error" => "Credenciales incorrectas"]);
}
?>
