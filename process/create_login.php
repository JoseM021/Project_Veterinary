<?php
require_once (__DIR__ ."/../conexion.php");
$connection = new Conexion();
$mysqli = $connection->connect();

if (!empty ($_POST["userlogin"])) {
    if (empty($_POST["username"]) or empty($_POST["password"])) {
        echo '<div class="campos-vacios">Los campos están vacios</div>';
    } else {
        $username = mysqli_real_escape_string($mysqli, $_POST["username"]);
        $password = trim($_POST["password"]);

        $result = $mysqli->query("SELECT id, username, password FROM User WHERE username='$username'");

        if ($result->num_rows > 0) {
            $user = $result->fetch_object();
            $passwordStored = $user->password;

            if (password_verify($password, $passwordStored)) {
                echo "La contraseña es válida";
                $_SESSION["authenticated"] = true;
                $_SESSION["User_id"] = $user->id;
                $_SESSION["username"] = $user->username;
                header("location: index.php");
            } else {
                echo "<div class='campos-vacios'>Contraseña Incorrecta</div>";
            }
        } else {
            echo "<div class='campos-vacios'>Usuario no encontrado :(</div>";
        }
    }
}
?>