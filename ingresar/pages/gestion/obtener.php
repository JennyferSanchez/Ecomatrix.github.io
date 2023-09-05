<?php
// Conexión a la base de datos
include("../coneccion/coneccion.php");
$proceso=$_POST['proceso'];
$sql="SELECT id , nombre from sub_proceso where id_pro='$proceso'";
$result=mysqli_query($conn,$sql);

$cadena="<label for='sub_pro'>Sub proceso</label> 
<select id='sub_proceso' class='form-control' name='sub_proceso'>";

while ($row=mysqli_fetch_assoc($result)) {
    $id= $row['id'];
    $pro= $row['nombre'];
    $cadena=$cadena.'<option value='.$id.'>'.$pro.'</option>';
}

echo  $cadena."</select>";

?>
