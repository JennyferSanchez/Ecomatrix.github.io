<?php
session_start();
include("../coneccion/coneccion.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION["user_id"];

$sql = "SELECT id FROM proyecto WHERE id_usuario = '$user_id'";
$result = $conn->query($sql);




if ($result->num_rows > 0) {

    header("Location: index.php");
    exit();

} else {
    
    header("Location: form.php");
    exit();
}
?>