<?php
require_once(__DIR__ ."/../controller/vaccine.controller.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";

    $vacunaController = new VaccineController();
    $vacuna = new Vacuna();
    $vacuna->id = $id;
    $vacuna->nombre = $nombre;

    $result = $vacunaController->update($vacuna);

    if ($result) {
        header('Location: ../viewVaccine/vaccineRegistered.php');
    } else {
        echo "Error al actualizar la vacuna";
    }
}
?>