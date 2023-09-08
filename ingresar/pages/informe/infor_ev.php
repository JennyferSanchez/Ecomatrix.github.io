<?php
include("../coneccion/error.php");



session_start();
include("../coneccion/coneccion.php");
include("../index/variable.php");
$user_id = $_SESSION["user_id"];
$proy_id = $_SESSION["proy_id"];
$query = "SELECT r.id, r.id_proy, a.nombre aspecto,  s.nombre id_subproseso, r.magnitud, r.Importancia, r.ma, r.im FROM registro r INNER JOIN aspectos a ON a.id=r.aspecto INNER JOIN sub_proceso s ON s.id=r.id_subproseso WHERE r.id_proy= $proy_id ";
$result = mysqli_query($conn, $query);
$user_id = $_SESSION["user_id"];
$proy_id = $_SESSION["proy_id"];



?>







<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EcoMatrix</title>
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../../../img/logo_eco.ico" />
</head>
 <?php
 include "../nav/nav2.php";
 ?>
 <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Aspectos</h4>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>aspecto</th>
                          <th>Sub_proceso</th>
                          <th>Magnitud</th>
                          <th>Impacto</th>
                          <th>#</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          while ($row = mysqli_fetch_assoc($result)) {
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
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
   


  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../js/dataTables.select.min.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <script src="../../js/dashboard.js"></script>
  <script src="../../js/Chart.roundedBarCharts.js"></script>

</body>

</html>