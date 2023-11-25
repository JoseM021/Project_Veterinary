<?php
require_once(__DIR__ . "/../controller/mascota.controller.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['id'])){
        $mascotaId = (int)$_POST['id'];

        $mascotaController = new MascotaController();
        $mascota = new Mascota();
        $mascota->id = $mascotaId;

        $result = $mascotaController->delete($mascota);

        if ($result) {
            header('Location: ../viewPet/mascotaRegistered.php');
            exit;
        } else {
            echo "Error al eliminar la mascota";
        }
    } else {
        echo "Error: ID de mascota no proporcionado";
    }
} else {
    header("Location: ../viewPet/mascotaRegistered.php");
    exit;
}
?>