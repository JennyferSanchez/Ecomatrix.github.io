<?php

session_start();
include("../coneccion/coneccion.php");
include("enviar_correo.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username =  $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $email = $_POST["email"];

    // Generar un código de verificación aleatorio
    $verificationCode = mt_rand(100000, 999999);

    $query1 = "SELECT email FROM usuarios WHERE email = '$email'";
    $result1 = mysqli_query($conn, $query1);

    if ($result->num_rows > 0){
      $query = "INSERT INTO usuarios ( username, password, email, verified, verification_code) VALUES ('$username', '$password', '$email', 0,   '$verificationCode')";
      $result = mysqli_query($conn, $query);

      if ($result) {
          $user_id = mysqli_insert_id($conn);
          // Enviar el correo electrónico con el código de verificación
          $emailSent = sendVerificationCode($email, $verificationCode); // Cambia esto
          if ($emailSent) {
              $_SESSION["user_id"] = $user_id;
              header("Location: verificar.php");
          } else {
              $error = "Error al enviar el correo de verificación.";
              echo $error;
          }
      } else {
          $error = "Error al registrar el usuario.";
          echo $error;
      }

    }else{
      $error = "Correo ya registrado resgitra otro.";
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
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../img/logo_eco.ico" />
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
              <h4>¿Nuevo aqui?</h4>
              <h6 class="font-weight-light">Registrate facil y rapido</h6>
              <form class="pt-3" method="POST" >

                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="username">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" placeholder="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="password">
                </div>
                <div class="mb-4">
                </div>
                <div class="mt-3">
  
                  <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit"  >

                 
                </div>
                <div class="text-center mt-4 font-weight-light">
                  ¿Ya tienes cuenta? <a href="login.php" class="text-primary">Ingresa</a>
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
      <!-- content-wrapper ends -->
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
