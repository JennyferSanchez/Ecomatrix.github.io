<?php

include("../coneccion/coneccion.php");
session_start();
global $document;

if (!isset($_SESSION["user_id"])) {
    header("Location: ../login/login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$proy_id = $_SESSION["proy_id"];



$query = "SELECT s.id id, s.nombre nombre, s.img img FROM sector s INNER JOIN  sector_usu u ON s.id=u.sector  INNER JOIN proyecto p ON p.id= u.id_proy  WHERE p.id= $proy_id   ";
$result = mysqli_query($conn, $query);
if (isset($_GET['id'])) {
  $_SESSION["proceso"] = $_GET['id'];
  $btn = $_SESSION["proceso"];
  $query1 = "SELECT r.id, r.id_proy, a.nombre aspecto,  s.nombre id_subproseso, r.magnitud, r.Importancia, r.ma, r.im FROM registro r INNER JOIN aspectos a ON a.id=r.aspecto INNER JOIN sub_proceso s ON s.id=r.id_subproseso INNER JOIN proceso o ON o.id=s.id_pro INNER JOIN sector z ON z.id=o.id_sector WHERE r.id_proy= $proy_id and z.id= $btn";
  $result1 = mysqli_query($conn, $query1);

} else {
  $query1 = "SELECT r.id, r.id_proy, a.nombre aspecto,  s.nombre id_subproseso, r.magnitud, r.Importancia, r.ma, r.im FROM registro r INNER JOIN aspectos a ON a.id=r.aspecto INNER JOIN sub_proceso s ON s.id=r.id_subproseso WHERE r.id_proy= $proy_id ";
  $result1 = mysqli_query($conn, $query1);
}
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
          <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Informe Evaluacion</h3>

                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i>sector
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <?php
                      while ($row = mysqli_fetch_assoc($result)) {
                              $id_img = $row["id"];
                              $nom_img = $row["nombre"];
                              echo "<a class='dropdown-item' href='infor_ev.php?id=$id_img'>$nom_img</a>";
                            }
                          ?>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              
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


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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