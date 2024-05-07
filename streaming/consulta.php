<?php

include_once('conexionDB.php');
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión
    include 'conexionDB.php';

    // Obtener las credenciales del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar si las credenciales son válidas
    $sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Las credenciales son válidas, redirigir a peliculas.html
        $_SESSION['username'] = $username;
        header("Location: peliculas.html");
        exit();
    } else {
        // Las credenciales no son válidas, mostrar un mensaje de error
            echo "Las credenciales no son correctas siga el siguiente link: ";
            echo "<a href='index.html'>Volver al inicio</a>";
    }
}

// Cerrar la conexión
$conn->close();
?>

