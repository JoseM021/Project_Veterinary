<?php
session_start();
require_once (__DIR__ ."/../conexion.php");
$connection = new Conexion();
$mysqli = $connection->connect();

if (!empty ($_POST["userlogin"])) {
    if (empty($_POST["username"]) or empty($_POST["password"])) {
        echo"Los campos están vacios";
    } else {
        $username = mysqli_real_escape_string($mysqli, $_POST["username"]);
        $password = trim($_POST["password"]);

        $result = $mysqli->query("SELECT id, password FROM User WHERE username='$username'");

        if ($result->num_rows > 0) {
            $user = $result->fetch_object();
            $passwordStored = $user->password;
            echo "Contraseña proporcionada: " . $password . "<br>";
            echo "Contraseña almacenada: " . $passwordStored . "<br>";

            if (password_verify($password, $passwordStored)) {
                echo "La contraseña es válida";
                $_SESSION["authenticated"] = 'true';
                $_SESSION["User_id"] = $user->id;
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