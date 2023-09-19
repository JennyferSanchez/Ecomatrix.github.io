


<?php
$hostname = "localhost";  // Cambia esto si tu base de datos está en otro servidor
$username = "root";
$password = "";
$database = "ecomatrix";

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>