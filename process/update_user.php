<?php
require_once(__DIR__ ."/../controller/user.controller.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $userController = new User_Controller();
    $user = new User();
    $user->id = $id;
    $user->username = $username;
    $user->password = $password;
    $user->email = $email;

    $result = $userController->update($user);

    if ($result) {
        header('Location: ../users_registered.php');
    } else {
        echo "Error al actualizar al usuario";
    }
}
?>
