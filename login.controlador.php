<?php
if (!empty ($_POST["userlogin"])) {
    if (empty($_POST["username"]) and empty($_POST["password"])) {
        echo "Los campos están vacíos";
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $mysqli = $mysqli->query("SELECT * FROM User WHERE username='$username' and password='$password' ");
        if ($datos=$mysqli->fetch_object()) {
            header("location:index.php");
        } else {
            echo "Usuario no encontrado :(";
        }
        
    }
}
?>