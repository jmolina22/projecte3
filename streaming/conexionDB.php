<?php 
$servername = "db"; 
$database = "streaming_db"; 
$username_db = "root"; 
$password_db = "password"; 
 

$conn = mysqli_connect($servername, $username_db, $password_db, $database);
// Check connection
if (!$conn) {
    die("Error de conexion: " . mysqli_connect_error());
}
//echo "Conexion exitosa";
//mysqli_close($conn);
?>
