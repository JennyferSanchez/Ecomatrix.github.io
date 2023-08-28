<?php
session_start();
include("coneccion.php");

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
            header("Location: index.php");
        } else {
            $error = "Error al verificar el código.";
        }
    } else {
        $error = "Código de verificación incorrecto.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verificar correo electrónico</title>
</head>
<body>
    <h2>Verificar correo electrónico</h2>
    <form method="post" action="">
        <label for="verification_code">Ingresa el código de verificación:</label>
        <input type="text" name="verification_code" required><br><br>
        <input type="submit" value="Verificar">
    </form>
    <?php
    if (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>
</body>
</html>
