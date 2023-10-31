<?php
session_start();
require_once (__DIR__ ."/../conexion.php");
if (!empty ($_POST["userlogin"])) {
    if (empty($_POST["username"]) or empty($_POST["password"])) {
        echo"Los campos están vacios";
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = $mysqli->query("SELECT password FROM User WHERE username='$username'");

        if ($result->num_rows > 0) {
            $user = $result->fetch_object();
            if (password_verify($password, $user->password)) {
                header("location: index.php");
            } else {
                echo "Contraseña Incorrecta";
            }
        } else {
            echo "Usuario no encontrado :(";
        }
    }
}
?>