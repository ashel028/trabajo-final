<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_POST["username"];
    echo "<br>";
    echo $_POST["password"];

    if ($_POST["username"] == "44299675" && $_POST["password"] == "zoepao2002") {
        echo "<br> Se logeo correctamente";
    } else {
        echo "<br> Los datos ingresados son incorrectos";
    }
}
?>
