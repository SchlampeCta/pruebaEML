<?php

$servername = "localhost";
$username = "usuario";
$password = "";
$dbname = "prueba_DB"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    // Validaciones
    if (!preg_match("/^[0-9]{10,15}$/", $telefono)) {
        die("Telefono no valido.");
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        die("Correo no valido.");
    }

    
    $sql = "INSERT INTO prueba_BD (nombre, apellidos, telefono, correo) VALUES (?, ?, ?, ?)";

   
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $nombre, $apellidos, $telefono, $correo);
        if ($stmt->execute()) {
            echo "Nuevo registro creado exitosamente.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
