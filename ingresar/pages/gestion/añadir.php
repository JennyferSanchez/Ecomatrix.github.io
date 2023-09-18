<?php

include("../coneccion/coneccion.php");
include("../index/variable.php");
$user_id = $_POST["user_id"];
$proy_id = $_POST["proy_id"];
$sector = $_POST["sector"];
$img= $_POST["img"];

$query = "INSERT INTO sector ( nombre, img) VALUES ($sector, $img)";
$result = mysqli_query($conn, $query4);
$sect_id = mysqli_insert_id($conn);

$query1 = "INSERT INTO sector_usu ( proy_id, sect_id) VALUES ($proy_id, $sect_id)";
$result1 = mysqli_query($conn, $query1);

?>