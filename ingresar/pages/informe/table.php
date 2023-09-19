



<?php
include("../coneccion/coneccion.php");
if (isset($_GET['id'])) {
    $_SESSION["proceso"] = $_GET['id'];
    $btn = $_SESSION["proceso"];
    $query1 = "SELECT r.id, r.id_proy, a.nombre aspecto,  s.nombre id_subproseso, r.magnitud, r.Importancia, r.ma, r.im FROM registro r INNER JOIN aspectos a ON a.id=r.aspecto INNER JOIN sub_proceso s ON s.id=r.id_subproseso WHERE r.id_proy= $proy_id ";
    $result1 = mysqli_query($conn, $query1);

} else {
    $query1 = "SELECT r.id, r.id_proy, a.nombre aspecto,  s.nombre id_subproseso, r.magnitud, r.Importancia, r.ma, r.im FROM registro r INNER JOIN aspectos a ON a.id=r.aspecto INNER JOIN sub_proceso s ON s.id=r.id_subproseso WHERE r.id_proy= $proy_id ";
    $result1 = mysqli_query($conn, $query1);
}

while ($row = mysqli_fetch_assoc($result1)) {
  echo "<tr>";
  echo "<td>{$row['id']}</td>";
  echo "<td>{$row['aspecto']}</td>";
  echo "<td>{$row['id_subproseso']}</td>";
    echo "<td>{$row['magnitud']}</td>";
    echo "<td>{$row['Importancia']}</td>";
    if($row['ma']==1 && $row['im']==1 ){
      echo "<td><img  src='../../images/impacto/9.png'></td>";
    }elseif($row['ma']==1 && $row['im']==2 ){
      echo "<td><img  src='../../images/impacto/8.png' ></td>";
    }elseif($row['ma']==1 && $row['im']==3 ){
      echo "<td><img  src='../../images/impacto/7.png' ></td>";
    }elseif($row['ma']==2 && $row['im']==1 ){
      echo "<td><img  src='../../images/impacto/6.png'></td>";
    }elseif($row['ma']==2 && $row['im']==2 ){
      echo "<td><img  src='../../images/impacto/5.png'></td>";
    }elseif($row['ma']==2 && $row['im']==3 ){
      echo "<td><img  src='../../images/impacto/4.png'></td>";
    }elseif($row['ma']==3 && $row['im']==1 ){
      echo "<td><img  src='../../images/impacto/3.png'></td>";
    }elseif($row['ma']==3 && $row['im']==2 ){
      echo "<td><img  src='../../images/impacto/2.png'></td>";
    }elseif($row['ma']==3 && $row['im']==3 ){
      echo "<td><img  src='../../images/impacto/1.png'></td>";
    }
  echo "</tr>";
}
?>