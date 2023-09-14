<?php
function sendVerificationCode($to, $code) {
    $subject = "Código de verificación";
    $message = "Tu código de verificación es: $code";
    $headers = "From: ecomtrix@jennycs.site"; // Cambia esto
    return mail($to, $subject, $message, $headers);
}
?>
