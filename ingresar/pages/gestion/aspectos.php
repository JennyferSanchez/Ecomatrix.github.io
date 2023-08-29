<?php




session_start();
include("../coneccion/coneccion.php");
$query = "SELECT a.id id, f.nombre factor, a.nombre nombre FROM aspectos a INNER JOIN factor_ambiental f on a.id_factor=f.id ";
$result = mysqli_query($conn, $query);

$query2 = "SELECT id , nombre FROM factor_ambiental";
$result2 = mysqli_query($conn, $query2);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nom"];
  $factor = $_POST["sub_f"];
  $desc= $_POST["dec"];


  $query3 = "INSERT INTO aspectos ( nombre, id_factor, descripcion) VALUES ('$nombre', $factor, '$desc')";
  $result3 = mysqli_query($conn, $query3);


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
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Aspectos</h4>
                  <p class="card-description">
                    si no encuentra algun aspecto agregelo
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="sub_c">Sub componente</label>
                      <select class="form-control" id="sub_f">
                        <?php
                          while ($row = mysqli_fetch_assoc($result2)) {
                              echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nom">Nombre</label>
                      <input type="text" class="form-control" id="nom" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="dec">Descripcion</label>
                      <textarea class="form-control" id="dec" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
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
                          <th>Factor</th>
                          <th>Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          while ($row = mysqli_fetch_assoc($result)) {
                              echo "<tr>";
                              echo "<td>{$row['id']}</td>";
                              echo "<td>{$row['factor']}</td>";
                              echo "<td>{$row['nombre']}</td>";
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