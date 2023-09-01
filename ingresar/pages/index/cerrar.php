<?php
session_start(); // Inicia la sesión

// Elimina todas las variables de sesión
$_SESSION = array();

// Destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio o a donde desees después de cerrar sesión
header("Location: ../../../index.html"); // Cambia "index.php" por la página a la que deseas redirigir al usuario
exit; // Asegura que no se procese más código después de la redirección
?>