<?php
session_start();
include("../coneccion/coneccion.php");
$user_id = $_SESSION["user_id"];
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login/login.php");
    exit();
}

if (isset($_GET['id'])) {
    $_SESSION["proceso"] = $_GET['id'];
    $btn = $_SESSION["proceso"];
    $query = "SELECT p.id id, p.nombre nombre, a.nombre act FROM  proceso p  INNER JOIN sector a on a.id=p.id_sector WHERE a.id='$btn'";
    $result = mysqli_query($conn, $query);  

} else {
    $query = "SELECT p.id id, p.nombre nombre, a.nombre act FROM  proceso p  INNER JOIN sector a on a.id=p.id_sector  INNER JOIN usuarios u on u.Actividad=a.id WHERE u.id='$user_id'";
    $result = mysqli_query($conn, $query);
}

$btn = $_SESSION["proceso"];

$query2 = "SELECT id, nombre FROM proceso WHERE id_sector=$btn";
$result2 = mysqli_query($conn, $query2);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nom"];
  $pro= $_POST["pro"];
  echo "Holi";

  $query4 = "INSERT INTO sub_proceso ( nombre, id_pro) VALUES ('$nombre', $pro)";
  $result4 = mysqli_query($conn, $query4);


}

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
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Procesos</h4>
                  <p class="card-description">
                    si no encuentra algun Sub Proceso agregelo
                  </p>
                  <form class="forms-sample" method="POST">
                    <div class="form-group">
                      <label for="sub_c">Proceso</label>
                      <select class="form-control" name="pro">
                        <?php
                            while ($row = mysqli_fetch_assoc($result2)) {
                                echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                            }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nom">Sub proceso</label>
                      <input type="text" class="form-control" name="nom" >
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<li class=' list-inline-item mb-4'>";
                                echo "<div class='card'>";
                                echo "<div class='card-body'>";
                                echo "<h4 class='card-title'>{$row['nombre']} </h4>";
                                echo "<p class='card-description'> </p>";
                                echo "<div class='table-responsive'>";
                                echo "<table class='table'>";
                                $query2 = "SELECT s.id id_sub, s.nombre nombre_s FROM sub_proceso s WHERE s.id_pro='{$row['id']}'";
                                $result2 = mysqli_query($conn, $query2);
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>ID</th>";
                                echo "<th>Nombre</th>";
                                echo "</tr>";
                                echo "</thead>";

                                while ($row = mysqli_fetch_assoc($result2)) {
                                        echo "<tr>";
                                        echo "<td>{$row['id_sub']}</td>";
                                        echo "<td>{$row['nombre_s']}</td>";
                                        echo "</tr>";
                                    }

                                echo "</tbody>";
                                echo "</table>";    
                        echo "</li>";
    
                            }
    
                         ?>
                         </ul>
              
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
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>