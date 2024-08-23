<?php
$servername = "localhost";
$username = "usuario"; 
$password = "";        
$dbname = "prueba_DB"; 

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

echo "Conexión exitosa";
$conn->close();
?>