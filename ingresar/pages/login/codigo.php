<?php
session_start();
include("../coneccion/coneccion.php");
include("enviar_correo.php");

$user_id = $_SESSION["user_id"];

$verificationCode = mt_rand(100000, 999999);



$query1 = "UPDATE usuarios SET verification_code = $verificationCode WHERE id = $user_id";
$result1 = mysqli_query($conn, $query1);

$query = "SELECT email FROM usuarios WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$emailSent = sendVerificationCode($row['email'], $verificationCode); // Cambia esto

header("Location: verificar2.php");
exit();
?>