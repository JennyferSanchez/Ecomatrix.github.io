<?php
session_start();
include("../coneccion/coneccion.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: register.php");
    exit();


}

$user_id = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredCode = $_POST["verification_code"];

    $query = "SELECT * FROM usuarios WHERE id = $user_id AND verification_code = '$enteredCode'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $query = "UPDATE usuarios SET verified = 1 WHERE id = $user_id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: ../index/dirigir.php");
        } else {
            $error = "Error al verificar el código.";
        }
    } else {
        $error = "Código de verificación incorrecto.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EcoMatrix</title>

  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../img/logo_eco.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <a href="../../../index.html"><img class="logo" src="../../../img/EcoMatrix (1).png" alt="logo"></a>
                
              </div>
              <h4>Verifica tu correo</h4>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg"  name="verification_code" placeholder="Codigo" required>
                </div>
                <div class="mt-3">
                    <input class="boton btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="Verificar" >
                </div>

              </form>
              <?php
                  if (isset($error)) {
                      echo "<p>$error</p>";
                      
                  }
                  ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>

</body>

</html>




