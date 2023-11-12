<?php
require_once (__DIR__ . "../../conexion.php");
require_once (__DIR__ . "../../controller/vaccine.controller.php");
require_once (__DIR__ . "../../model/Vacuna.php");

$vacunaController = new VaccineController();
$connection = $vacunaController->connect();

if (isset($_POST["uservaccine"])) {
    $nameVaccine = $_POST["vaccine"];

    if (empty($nameVaccine)){
        echo "<div>Campo Vacío</div>";
    } else {
        $vacuna = new Vacuna();
        $vacuna->nombre = $nameVaccine;

        $query = "SELECT * FROM vacuna WHERE nombre = '{$nameVaccine}'";
        $resultado = $connection->query($query);

        if ($resultado->num_rows > 0) {
            $messageDuplicateVaccineRegister = "Vacuna ya existente";
            echo "<div class=\"errorDuplicateRegister\">{$messageDuplicateVaccineRegister}</div>";
        } else {
            $vacunaController->create($vacuna);
            $messageDuplicateVaccineRegistered = "Vacuna registrada";
            echo "<div class=\"errorDuplicateRegistered\">{$messageDuplicateVaccineRegistered}</div>";
            header("Location: vaccineIndex.php");
        }
    }
}

?>
