<?php
$host = "localhost";
$user = "paquito";
$password = "";
$database = "compania";

$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $celular = $_POST['celular'] ?? '';
    $email = $_POST['email'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Verificar que los campos no estén vacíos
    if (empty($nombre) || empty($celular) || empty($email) || empty($contrasena)) {
        echo "Por favor, completa todos los campos.";
        exit();
    }

    $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("INSERT INTO users (nombre, celular, email, contrasena) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $celular, $email, $hashed_password);
    
    if ($stmt->execute()) {
        echo "Registro exitoso";
        header("Location: http://localhost/CRUD/form.html");
        exit();
    } else {
        echo "Error: " . $stmt->error . " " . mysqli_error($conn);
    }
    $stmt->close();
}

?>
