<?php

include('conexionDB.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $phone = $_POST['phone']; 
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Error: Este usuario ya está registrado escoja otras credenciales. <a href='index.html'>Vuelve a intentarlo</a>";
        
    } else {
        $sql = "INSERT INTO usuarios (id, username, password,phone,email) VALUES ('$id', '$username', '$password', '$phone', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "Perfil creado con éxito. ";
            echo "<a href='index.html'>Volver al inicio</a>"; // Agregar un enlace para volver al inicio
            exit; // Salir del script para evitar que se procese el formulario nuevamente
        } else {
            echo "Error al crear el perfil. Se repite algun campo: " . $conn->error;
        }   echo "<a href='index.html'>Volver al inicio</a>";
    }
}

$conn->close();

?>
