<?php
require_once(__DIR__ . "/../controller/mascota.controller.php");
require_once(__DIR__ . "/../controller/tipomascota.controller.php");
require_once(__DIR__ . "/../controller/raza.controller.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $tipoMascotaId = isset($_POST["TipoMascota_id"]) ? $_POST["TipoMascota_id"] : "";
    $razaNombre = isset($_POST["raza"]) ? $_POST["raza"] : "";
    $FechaNacimiento = isset($_POST["fechaNacimiento"]) ? $_POST["fechaNacimiento"] : "";

    $tipoMascotaController = new TipoMascotaController();
    $razaController = new RazaController();
    $mascotaController = new MascotaController();

    $mascota = $mascotaController->getMascotaById($id);

    if ($razaNombre != $mascota->getRaza()->nombre) {

        $razaId = $razaController->getIdByName($razaNombre);
    

        if (!$razaId) {
            $raza = new Raza();
            $raza->nombre = $razaNombre;
            $raza->TipoMascota_id = 1;
            $razaController->create($raza);
            $razaId = $razaController->getIdByName($razaNombre); 
        }
    
        $mascota->Raza_id = $razaId;

        $result = $mascotaController->update($mascota);
    }

    $mascota->nombre = $nombre;
    $mascota->TipoMascota_id = $tipoMascotaId;
    $mascota->FechaNacimiento = $FechaNacimiento;

    if ($result) {
        header('Location: ../viewPet/mascotaRegistered.php');
        exit();
    } else {
        echo "Error al actualizar la mascota";
    }
}
?>