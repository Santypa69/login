<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Conectar a la base de datos
$host = "localhost";
$user = "paquito";
$password = "";
$database = "compania";

$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("SELECT contrasena FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        if (password_verify($contrasena, $hashed_password)) {
            $_SESSION['email'] = $email;

            // Redirige a la página de destino
            header("Location: http://localhost/CRUD/form.html");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "No se encontró el usuario";
    }
    $stmt->close();
}
$conn->close();
?>