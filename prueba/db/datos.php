<?php
header('Content-Type: text/html; charset=UTF-8');

$conn = new mysqli('localhost', 'usuario', 'contraseña', 'base_de_datos');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

// Llenar la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['ID']}</td>";
        echo "<td>{$row['nombre']}</td>";
        echo "<td>{$row['apellidos']}</td>";
        echo "<td>{$row['telefono']}</td>";
        echo "<td>{$row['correo']}</td>";
        echo "<td>{$row['fecha_registro']}</td>";
        echo "<td>{$row['fecha_ultima_modificacion']}</td>";
        echo "<td><button>Editar</button> <button>Eliminar</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No hay datos</td></tr>";
}

$conn->close();
