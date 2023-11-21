<?php
require_once(__DIR__ ."/../controller/vaccine.controller.php");

$id = $_POST['id'];

$vacunaController = new VaccineController();
$vacuna = new Vacuna();
$vacuna->id = $id;

if ($vacunaController->isVaccineUsed($vacuna)) {
    echo "Error: Esta vacuna está siendo utilizada y no puede ser eliminada.";
} else {
    $result = $vacunaController->delete($vacuna);

    if ($result) {
        header('Location: ../viewVaccine/vaccineRegistered.php');

    } else {
        echo "Error al eliminar la vacuna";
    }
}
?>
