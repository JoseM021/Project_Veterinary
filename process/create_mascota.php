<?php
require_once __DIR__ . "../../conexion.php";
require_once __DIR__ . "../../controller/vaccine.controller.php";
require_once __DIR__ . "../../model/Vacuna.php";

if (!isset($_POST["fechaNacimiento"])) {
    exit;
}
if (!isset($_POST["TipoMascota_id"])) {
    exit;
}
if (!isset($_POST["Raza_id"])) {
    exit;
}

$fechaNacimiento = DateTime::createFromFormat("d/m/Y", $_POST["fechaNacimiento"]);
if (!$fechaNacimiento) {
    exit;
}

require_once __DIR__ . "../../model/Mascota.php";

$mascota = new Mascota();
$mascota->nombre = $_POST["nombre"];
$mascota->FechaNacimiento = $fechaNacimiento;
$mascota->User_id = $_POST["User_id"];
$mascota->TipoMascota_id = intval($_POST["TipoMascota_id"]);
$mascota->Raza_id = intval($_POST["Raza_id"]);

$mascotaController = new MascotaController();
$result = $mascotaController->create($mascota);

if ($result) {
    header("Location: mascotaIndex.php");
} else {
    echo "Error al registrar mascota.";
}

?>
