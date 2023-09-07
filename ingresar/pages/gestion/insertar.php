<?php
// Conexión a la base de datos
include("../coneccion/coneccion.php");
include("../index/variable.php");
$user_id = $_SESSION["user_id"];
$proy_id = $_SESSION["proy_id"];

$magnitud= 0;
$import= 0;
$in=$_POST['Intensidad'];
$af=$_POST['Afectacion'];

$du=$_POST['Duracion'];
$inf=$_POST['Influencia'];

$aspecto=$_POST['aspecto'];
$sub_pro=$_POST['sub_proceso'];
$impacto=$_POST['impacto'];
$caracter=$_POST['Caracter'];


if($af==1 && $in==1){
    $magnitud= 1*$caracter;
}elseif($af==1 && $in==2){
    $magnitud= 2*$caracter;
}elseif($af==1 && $in==3){
    $magnitud= 3*$caracter;
}elseif($af==2 && $in==1){
    $magnitud= 4*$caracter;
}elseif($af==2 && $in==2){
    $magnitud= 5*$caracter;
}elseif($af==2 && $in==3){
    $magnitud= 6*$caracter;
}elseif($af==3 && $in==1){
    $magnitud= 7*$caracter;
}elseif($af==3 && $in==2){
    $magnitud= 8*$caracter;
}elseif($af==3 && $in==3){
    $magnitud= 9*$caracter;
}elseif($af==4 && $in==3){
    $magnitud= 10*$caracter;
}

if($du==1 && $inf==1){
    $import= 1;
}elseif($du==2 && $inf==1){
    $import= 2;
}elseif($du==3 && $inf==1){
    $import= 3;
}elseif($du==1 && $inf==2){
    $import= 4;
}elseif($du==2 && $inf==2){
    $import= 5;
}elseif($du==3 && $inf==2){
    $import= 6;
}elseif($du==1 && $inf==3){
    $import= 7;
}elseif($du==2 && $inf==3){
    $import= 8;
}elseif($du==3 && $inf==3){
    $import= 9;
}elseif($du==3 && $inf==4){
    $import= 10;
}

$query4 = "INSERT INTO registro ( aspecto, id_proy, des_impac, id_subproseso, magnitud, Importancia, ma, im) VALUES ($aspecto, $proy_id, $impacto, $sub_pro, $magnitud, $import, $af, $du)";
$result4 = mysqli_query($conn, $query4);


?>