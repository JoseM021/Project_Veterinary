<?php
function create_mascota($codigoError, $campo) {
    $_POST["error"] = $codigoError;
    $_POST["campo"] = $campo;

    header("Location: create_mascota.php");
    exit();
}

$camposRequeridos = ["nombre", "fechaNacimiento", "TipoMascota_id", "Raza_id"];
foreach ($camposRequeridos as $campo) {
    if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
        exit("El campo '$campo' es obligatorio.");
    }

    if (empty($_POST[$campo])) {
        exit("El valor del campo '$campo' debe estar relleno.");
    }
}

$fechaNacimiento = DateTime::createFromFormat("d/m/Y", $_POST["fechaNacimiento"]);
if (!$fechaNacimiento) {
exit("Fecha de nacimiento inválida. Use el formato dd/mm/yyyy.");
}

$mascota = new Mascota();
$mascota->nombre = $_POST["nombre"];
$mascota->FechaNacimiento = $fechaNacimiento;
$mascota->User_id = $_POST["User_id"];
$mascota->TipoMascota_id = intval($_POST["TipoMascota_id"]);
$mascota->Raza_id = intval($_POST["Raza_id"]);

var_dump($_POST);
var_dump($mascota);

require_once __DIR__ . "../../model/Mascota.php";

$mascotaController = new MascotaController();
$result = $mascotaController->create($mascota);

$result = [
    "nombre" => $mascota->nombre,
    "fechaNacimiento" => $mascota->FechaNacimiento,
    "TipoMascota_id" => $mascota->TipoMascota_id,
    "Raza_id" => $mascota->Raza_id,
];

if ($result) {
header("Location: mascotaRegistered.php?mascota=" . json_encode($result));
} else {
echo "Error al crear la mascota.";
}
?>