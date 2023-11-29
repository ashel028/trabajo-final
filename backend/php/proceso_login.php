<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han enviado datos de usuario y contraseña
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Verificar las credenciales (en este caso, usuario: 44299675, contraseña: zoepao2002)
        if ($username === "44299675" && $password === "zoepao2002") {
            // Inicio de sesión exitoso
            session_start();
            $_SESSION["username"] = $username;
            header("Location: dashboard.php"); // Redirigir al usuario a la página de inicio después de iniciar sesión
            exit();
        } else {
            // Credenciales incorrectas
            header("Location: login.php?error=1"); // Redirigir con un parámetro de error
            exit();
        }
    }
}

// Si no se enviaron datos POST, redirigir a la página de inicio de sesión
header("Location: login.php");
exit();

?>
