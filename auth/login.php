<?php
// /auth/login.php
session_start();
require_once '../config/conexion.php'; // Asumimos que aquí se instancia $pdo usando PDO y el archivo .env

// Configurar los encabezados para devolver JSON
header('Content-Type: application/json');

// Obtener la acción solicitada desde el frontend
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? '';

switch ($action) {
    
    // ====================================================================
    // 1. LOGIN DE DIRECTORES Y MAESTROS
    // ====================================================================
    case 'login_staff':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = $_POST['password'] ?? '';

        if (!$username || !$password) {
            echo json_encode(['success' => false, 'message' => 'Faltan credenciales.']);
            exit;
        }

        try {
            $stmt = $pdo->prepare("SELECT id_usuario, rol, password, id_mined FROM Usuarios WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificación de contraseña hasheada (Obligatorio para el estándar de seguridad)
            if ($user && password_verify($password, $user['password'])) {
                // Iniciar sesión en el servidor
                $_SESSION['user_id'] = $user['id_usuario'];
                $_SESSION['rol'] = $user['rol'];
                $_SESSION['id_mined'] = $user['id_mined'];

                echo json_encode([
                    'success' => true, 
                    'rol' => $user['rol'], 
                    'message' => 'Autenticación exitosa.'
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Error de base de datos.']);
        }
        break;

    // ====================================================================
    // 2. FLUJO DE ALUMNOS - PASO 1: OBTENER SALONES POR CÓDIGO DE CENTRO
    // ====================================================================
    case 'get_salones':
        $id_mined = filter_input(INPUT_POST, 'id_mined', FILTER_SANITIZE_STRING);

        try {
            // Validar que la institución existe y obtener sus salones
            $stmt = $pdo->prepare("
                SELECT id_salon, nombre_salon, codigo_aula 
                FROM Salones 
                WHERE id_mined = ?
            ");
            $stmt->execute([$id_mined]);
            $salones = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($salones) > 0) {
                echo json_encode(['success' => true, 'salones' => $salones]);
            } else {
                echo json_encode(['success' => false, 'message' => 'No se encontraron salones para este Código de Centro.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Error al consultar la institución.']);
        }
        break;

    // ====================================================================
    // 3. FLUJO DE ALUMNOS - PASO 2: OBTENER ALUMNOS DEL SALÓN SELECCIONADO
    // ====================================================================
    case 'get_alumnos':
        $id_salon = filter_input(INPUT_POST, 'id_salon', FILTER_SANITIZE_NUMBER_INT);

        try {
            $stmt = $pdo->prepare("SELECT id_alumno, nombre_display FROM Alumnos WHERE id_salon = ? ORDER BY nombre_display ASC");
            $stmt->execute([$id_salon]);
            $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode(['success' => true, 'alumnos' => $alumnos]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Error al consultar el listado de alumnos.']);
        }
        break;

    // ====================================================================
    // 4. FLUJO DE ALUMNOS - PASO 3: VALIDACIÓN DEL PIN
    // ====================================================================
    case 'login_alumno':
        $id_alumno = filter_input(INPUT_POST, 'id_alumno', FILTER_SANITIZE_NUMBER_INT);
        $pin = filter_input(INPUT_POST, 'pin', FILTER_SANITIZE_STRING); // PIN de 4 dígitos

        try {
            // Nota: Para estudiantes de primaria, el PIN puede manejarse en texto plano o un hash muy básico 
            // dependiendo de los requerimientos de la escuela. Aquí asumimos validación directa.
            $stmt = $pdo->prepare("SELECT id_alumno, nombre_display, pin, id_salon FROM Alumnos WHERE id_alumno = ?");
            $stmt->execute([$id_alumno]);
            $alumno = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($alumno && $alumno['pin'] === $pin) {
                // Generamos un token simple de sesión para el alumno que el frontend 
                // guardará en localStorage (según requerimiento de persistencia).
                $alumno_token = bin2hex(random_bytes(16)); 
                
                echo json_encode([
                    'success' => true,
                    'alumno' => [
                        'id_alumno' => $alumno['id_alumno'],
                        'nombre_display' => $alumno['nombre_display'],
                        'id_salon' => $alumno['id_salon']
                    ],
                    'token' => $alumno_token,
                    'message' => 'Acceso concedido.'
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'PIN incorrecto. Inténtalo de nuevo.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Error al validar el PIN.']);
        }
        break;

    // ====================================================================
    // ACCIÓN NO RECONOCIDA
    // ====================================================================
    default:
        echo json_encode(['success' => false, 'message' => 'Acción no válida.']);
        break;
}
?>