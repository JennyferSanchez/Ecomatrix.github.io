<?php
include("../coneccion/error.php");
session_start();
global $document;
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login/login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$proy_id = $_SESSION["proy_id"];

include("../coneccion/coneccion.php");
$query = "SELECT s.id id, s.nombre nombre, s.img img FROM sector s INNER JOIN  sector_usu u ON s.id=u.sector  INNER JOIN proyecto p ON p.id= u.id_proy  WHERE p.id= $proy_id   ";
$result = mysqli_query($conn, $query);





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- plugins:css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <title>EcoMatrix</title>
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../../../img/logo_eco.ico" />

</head>

<body>
  <div class="container-scroller">
    <?php
        include "../nav/nav2.php";
    ?>
      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card-body">
                      <h4 class="card-title">Actividad</h4>
                      <p class="card-description">Selecciona en la actividad que vas a trabajar</p>
                      <div class="template-demo d-flex mt-2 ">
                          <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                              $image_blob = $row["img"];
                              $id_img = $row["id"];
                              $nom_img = $row["nombre"];
                              echo "<a href= 'mapa.php?id=$id_img'><button  class='btn btn-outline-dark'>";
                                  echo "<img alt='Imagen' class='imagenes rounded' src='data:png;base64," . base64_encode($image_blob) . "' alt='Imagen'>";                           
                                  echo "<span class='d-inline-block text-left'>";
                                    echo "<small class='font-weight-light d-block'>SECTOR</small>";
                                    echo "$nom_img";
                                  echo "</span>";
                                  echo "</a>";
                            }
                          ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
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
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/pop.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- endinject -->
</body>

</html>
