<?php
// --- Conexión a la base de datos ---
require_once("../config/conexion.php");

// --- Obtener datos del formulario ---
$id_usuario   = $_POST["identificador"];
$ciudad       = $_POST['city'] ?? '';
$categoria    = $_POST['category'] ?? '';
$kg           = $_POST['kg'] ?? 0;
$score        = $_POST['score'] ?? 0;

// --- Guardar en la tabla "clasificacion" ---
$sql = "INSERT INTO `clasificacion`( 
`ID_Usuario`, `Nombre`, `Ciudad`, `Categoria`, `Puntos`, `KgReciclados`) 
VALUES ($id_usuario,$nombre_usuario,'[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssddddddddddsd", 
    $ciudad, $categoria, $paper, $plastic, $glass, $metal, $organic, $electronics,
    $peopleEduc, $cleanup, $consecutive, $reuse, $story, $score
);

if ($stmt->execute()) {
    echo "<script>alert('✅ Datos guardados con éxito'); window.location.href='premios.php';</script>";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
