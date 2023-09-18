<?php
include("../coneccion/error.php");
session_start();
include("../coneccion/coneccion.php");
if (!isset($_SESSION["user_id"])) {
  header("Location: ../login/login.php");
  exit();
}

$user_id = $_SESSION["user_id"];
$query = "SELECT id, nombre FROM sector";
$result = mysqli_query($conn, $query);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nom"];
  $desc = $_POST["dec"];
  $query2 = "INSERT INTO proyecto ( nombre, id_usuario, descripcion) VALUES ('$nombre', $user_id , '$desc')";
  $result2 = mysqli_query($conn, $query2);
  $proy_id = mysqli_insert_id($conn);
  if($nombre!= " " && $desc!= " "){
    while($row = mysqli_fetch_assoc($result)){
      $id= $row['id'];
      if($_POST["proceso_".$id]){      
      $query3 = "INSERT INTO sector_usu (id_proy, sector) VALUES ($proy_id, $id )";
      $result3 = mysqli_query($conn, $query3);
      }
    }
      if($result3){
        header("Location: index.php");
        exit();
      }else{
        $error= "no";
      }

  }else{
    $error= "Porfavor diligenciar todos los campos";
  }
  
   
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

<div class="container-scroller">
  <?php
  include '../nav/nav2.php';
  ?>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Bienvenido a EcoMatrix</h3>
              <h6 class="font-weight-normal mb-0">Antes de empezar ingrese su proyecto</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Proyecto</h4>
              <p class="card-description">
                holi
              </p>
              <form class="forms-sample" method="POST">
                <div class="form-group">
                  <div class="form-group">
                    <label for="nom">Nombre</label>
                    <input type="text" class="form-control" name="nom">
                  </div>
                  <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                    $id= $row['id'];
                    $name= $row['nombre'];
                    echo "<div class='form-check'>";
                    echo "<label class='form-check-label'>";
                    echo "<input type='checkbox' id='proceso' name='proceso_".$id."' class='form-check-input' value=".$id." >";
                    echo $name;
                    echo "</label>";
                    echo "</div>";
                  }
                  ?>
                  <div class="form-group">
                    <label for="dec">Descripcion</label>
                    <textarea class="form-control" name="dec" rows="4"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                  <?php
                  if (isset($error)) {
                      echo "<p>$error</p>";
                      
                  }
                  ?>
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


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