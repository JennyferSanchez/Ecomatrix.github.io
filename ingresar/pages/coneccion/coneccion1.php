
<?php
$hostname = "localhost";  // Cambia esto si tu base de datos está en otro servidor
$username = "u985211323_jenny";
$password = "Omg09123*";
$database = "u985211323_ecomatrix";

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>