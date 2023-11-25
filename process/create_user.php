<?php
if (!isset($_SESSION["error_message_form"]) && !isset($_SESSION["error_message_duplicate"]) && !empty($_POST["userregister"])) {
    if (empty($_POST["username"]) or empty($_POST["password"]) or empty($_POST["email"])) {
        $_SESSION["error_message_form"] = "<div class='campos-vacios'>Todos los campos son obligatorios</div>";
    }
    else {
        $userController = new User_Controller();
        $user = new User();
        $password = $_POST["password"];
        $cryptPassword = password_hash($password, PASSWORD_BCRYPT);
        $user->password = $cryptPassword;
        $user->username = $_POST["username"];
        $user->email = $_POST["email"];
        $user->Role_id=2;

        $connection = $userController->connect();

        $username = mysqli_real_escape_string($connection, $_POST["username"]);
        $email = mysqli_real_escape_string($connection, $_POST["email"]);
        $sqlCheckDuplicate = "SELECT username, email FROM User Where username = '$username' OR email = '$email'";
        $resultCheckDuplicate = $connection->query($sqlCheckDuplicate);


        if ($resultCheckDuplicate->num_rows > 0) {
            $_SESSION["error_message_duplicate"] = "<div class='campos-vacios'>Usuario ya existente</div>";
        } else {
            $status = $userController->create($user);
            if ($status) {
                $_SESSION["succes_message"] = "<div class='campos-vacios'>Usuario creado exitosamente</div>";
                header("Location:login.php");
                exit;
            } else {
                $_SESSION["error_message_create"] = "<div class='campos-vacios'>Error al crear el usuario</div>";
            }
        }
        $connection->close();
    } 
   }
?>