<?php
session_start();
include("../coneccion/coneccion.php");
include("../index/variable.php");
$user_id = $_SESSION["user_id"];
$proy_id = $_SESSION["proy_id"];



if (isset($_GET['id'])) {
  $_SESSION["sector"] = $_GET['id'];

}

if (isset($_GET['proc'])) {
  $_SESSION["proceso"] = $_GET['proc'];

}else{
  $_SESSION["proceso"] = 1;
}
$btn= $_SESSION['sector'];
$proceso = $_SESSION["proceso"];
$query1 = "SELECT id, nombre FROM proceso  WHERE id_sector= $btn ";
$result1 = mysqli_query($conn, $query1);




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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="../../css/skilline.css">
  <link rel="shortcut icon" href="../../../img/logo_eco.ico" />
</head>
 <?php
 include "../nav/nav2.php";
 ?>
 <div class="main-panel">        
        <div class="content-wrapper">
        <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Informe Evaluacion</h3>

                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i>procesos
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <?php
                      while ($row = mysqli_fetch_assoc($result1)) {
                              $id_img = $row["id"];
                              $nom_img = $row["nombre"];
                              echo "<a class='dropdown-item' href='mapa.php?proc=$id_img'>$nom_img</a>";
                            }
                          ?>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Matriz leopold</h4>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive">
                  <table>
                  <?php
                    
                    $sql = "SELECT id, nombre FROM aspectos";
                    $result3 = mysqli_query($conn, $sql);

                    while ($row1 = mysqli_fetch_assoc($result3)) {
                      $query2 = "SELECT id id_sub, nombre nombre_s FROM sub_proceso  WHERE id_pro= $proceso ";
                      $result2 = mysqli_query($conn, $query2);
                      $asp= $row1['id'];
                      $asp_n= $row1['nombre'];
                      echo "<tr>";
                      while ($row = mysqli_fetch_assoc($result2)) {
                        $sub= $row['id_sub'];
                        $sub_n= $row['nombre_s'];
                        $query4 = "SELECT id, Importancia,  magnitud  FROM registro r WHERE id_proy= $proy_id and aspecto=$asp and id_subproseso= $sub";
                        $result4 = mysqli_query($conn, $query4);
                        $row2= mysqli_fetch_assoc($result4);
                        
                        
                        if(!empty($row2['Importancia'])  && !empty($row2['magnitud'])){
                          $imp= $row2['Importancia'];
                          $mag= $row2['magnitud'];
                          if ($mag< 0) {
                            $color= "#OAFB34";
                        } else {
                          $color= "#ef9898";
                        }
                        }else{
                          $color= "#FFFFFF";
                          $imp= 0;
                          $mag= 0;
                        }


                        
                        
                        echo "<td style='background-color:$color; width: 50px; '>";
                        echo "<a class='text-decoration-none' style='color: black'  href='table.php' title='$asp_n - $sub_n'>";
                        echo "<div>";
                        echo "<div style='background-color:$color;' class='c1'>$mag</div>";
                        echo "<div class='c2'>$imp</div>"; 
                        echo "</div>";   
                        echo "</a>";
                        echo "</td>";
                        

                        
                                
    
                            }
                      echo "</tr>";
                    }
                    ?>           
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