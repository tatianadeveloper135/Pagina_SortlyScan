<?php
// /config/conexion.php

class Database {
    private $conn;

    public function getConnection() {
        $this->conn = null;
        
        // Leemos el archivo .env (asumiendo que está una carpeta atrás de 'config')
        $env_path = __DIR__ . '/../.env';
        $env = file_exists($env_path) ? parse_ini_file($env_path) : [];

        $host = $env['DB_HOST'] ?? 'localhost';
        $db_name = $env['DB_NAME'] ?? 'bdsortlyscan';
        $username = $env['DB_USER'] ?? 'root';
        $password = $env['DB_PASS'] ?? '';

        try {
            $this->conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name . ";charset=utf8mb4", $username, $password);
            // Configurar PDO para que lance excepciones en caso de error
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo json_encode(["error" => "Error de conexión a la Base de Datos."]);
            exit;
        }
        
        return $this->conn;
    }
}
?>