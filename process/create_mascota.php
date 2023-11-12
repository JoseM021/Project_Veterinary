<?php
require_once (__DIR__ . "../../conexion.php");
require_once (__DIR__ . "../../controller/vaccine.controller.php");
require_once (__DIR__ . "../../model/Vacuna.php");

$nombre = $_POST["nombre"];
$fechaNacimiento = $_POST["fechaNacimiento"];
$user_id = $_POST["User_id"];
$tipoMascotaId = $_POST["TipoMascota_id"];
$razaId = $_POST["Raza_id"];

$mascota = new Mascota();

$mascota->nombre = $nombre;
$mascota->FechaNacimiento = $fechaNacimiento;
$mascota->User_id = $user_id;
$mascota->TipoMascota_id = $tipoMascotaId;
$mascota->Raza_id= $razaId;

$mascotaController = new MascotaController();
$result = $mascotaController->create ($mascota);

if ($result) {
    header("Location: mascotaIndex.php");
} else {
    echo "Error al registrar mascota";
}
?>