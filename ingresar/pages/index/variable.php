<?php
session_start();

$user_id = $_SESSION["user_id"];

$proy= "SELECT id, nombre FROM proyecto WHERE  id_usuario= $user_id";
$result= mysqli_query($conn, $proy);

while ($row = mysqli_fetch_assoc($result)) {
    $_SESSION["proy_id"] = $row["id"];
    $_SESSION["proy"] = $row["nombre"];
}

?>