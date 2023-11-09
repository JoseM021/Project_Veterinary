<?php
require_once(__DIR__ ."/../controller/user.controller.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";

    $cryptPassword = password_hash($password, PASSWORD_BCRYPT);

    $userController = new User_Controller();
    $user = new User();
    $user->id = $id;
    $user->username = $username;
    $user->password = $cryptPassword;
    $user->email = $email;

    $result = $userController->update($user);

    if ($result) {
        header('Location: ../users_registered.php');
    } else {
        echo "Error al actualizar al usuario";
    }
}
?>
