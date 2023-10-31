<?php
require_once(__DIR__ ."/../controller/user.controller.php");

$id = $_POST['id'];

$userController = new User_Controller();
$user = new User();
$user->id = $id;

$result = $userController->delete($user);

if ($result) {
    header('Location: ../users_registered.php');
} else {
    echo "Error al eliminar al usuario";
}
?>