<?php
require_once(__DIR__ . "/../controller/mascota.controller.php");
require_once(__DIR__ . "/../controller/tipomascota.controller.php");
require_once(__DIR__ . "/../controller/raza.controller.php");
require_once(__DIR__ . "/../controller/user.controller.php");
require_once(__DIR__ . "/../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $tipoMascota_id = $_POST["TipoMascota_id"];
    $raza_id = $_POST["Raza_id"];
    $fechaNacimiento = $_POST["fechaNacimiento"];

    echo "ID: $id<br>";
    echo "Nombre: $nombre<br>";
    echo "TipoMascota ID: $tipoMascota_id<br>";
    echo "Raza ID: $raza_id<br>";
    echo "Fecha de Nacimiento: $fechaNacimiento<br>";

    $mascotaController = new MascotaController();
    $mascota = new Mascota();
    $mascota->id = $id;
    $mascota->nombre = $nombre;
    $mascota->TipoMascota_id = $tipoMascota_id;
    $mascota->FechaNacimiento = $fechaNacimiento;
    $mascotaController->update($mascota);

    $razaController = new RazaController();
    $raza = $razaController->getById($raza_id);

    if ($raza) {
        $raza->nombre = $_POST["raza"];
        $razaController->update($raza);
    }    
    header("Location: ../viewPet/mascotaRegistered.php");
    exit();
}
?>