<?php
require_once(__DIR__ ."/../controller/controlvaccine.controller.php");

$Mascota_id = $_POST['Mascota_id'];
$Vacuna_id = $_POST['Vacuna_id'];

$controlVacunaController = new ControlVaccineController();
$controlVacuna = new ControlVacuna();
$controlVacuna->Mascota_id = $Mascota_id;
$controlVacuna->Vacuna_id = $Vacuna_id;

$result = $controlVacunaController->delete($controlVacuna);

if ($result) {
    header('Location: ../viewControlVaccine/controlVaccineRegistered.php');
} else {
    echo "Error al eliminar el control de vacuna";
}
?>