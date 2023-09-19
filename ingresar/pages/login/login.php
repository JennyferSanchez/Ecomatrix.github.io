<?php
session_start();
include("../coneccion/coneccion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email= $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT id, password FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row["password"];

        if (password_verify($password, $stored_password)) {
            // Contraseña válida, inicio de sesión exitoso
            $_SESSION["user_id"] = $row["id"];
            header("Location: ../index/dirigir.php");
        } else {
            // Contraseña incorrecta
            $error = "Nombre de usuario o contraseña incorrectos holi.";
        }
    } else {
        // Usuario no encontrado
        $error = "Nombre de usuario o contraseña incorrectos.";
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
              <h4>Hola! vamos a empezar</h4>
              <h6 class="font-weight-light">ingresa para empezar.</h6>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg"   required  name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg"  required name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                <input class="boton btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit"  >
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
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
