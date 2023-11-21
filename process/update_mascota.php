<?php
require_once(__DIR__ . "/../controller/mascota.controller.php");
require_once(__DIR__ . "/../controller/tipomascota.controller.php");
require_once(__DIR__ . "/../controller/raza.controller.php");

var_dump($_POST); // Muestra el contenido de $_POST para verificar los datos recibidos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $tipoMascotaNombre = isset($_POST["tipoMascotaNombre"]) ? $_POST["tipoMascotaNombre"] : "";
    $razaNombre = isset($_POST["razaNombre"]) ? $_POST["razaNombre"] : "";
    $FechaNacimiento = isset($_POST["FechaNacimiento"]) ? $_POST["FechaNacimiento"] : "";

    var_dump($id, $nombre, $tipoMascotaNombre, $razaNombre, $FechaNacimiento); // Muestra los valores para verificar

    $tipoMascotaController = new TipoMascotaController();
    $tipoMascotaId = $tipoMascotaController->getIdByName($tipoMascotaNombre);

    $razaController = new RazaController();
    $razaId = $razaController->getIdByName($razaNombre);

    $mascotaController = new MascotaController();
    $mascota = new Mascota();
    $mascota->id = $id;
    $mascota->nombre = $nombre;
    $mascota->TipoMascota_id = $tipoMascotaId;
    $mascota->Raza_id = $razaId;
    $mascota->FechaNacimiento = $FechaNacimiento;

    var_dump($mascota); // Muestra la instancia de la mascota antes de la actualización

    $result = $mascotaController->update($mascota);

    if ($result) {
        header('Location: ../viewPet/mascotaRegistered.php');
        exit();
    } else {
        echo "Error al actualizar la mascota";
    }
}
?>