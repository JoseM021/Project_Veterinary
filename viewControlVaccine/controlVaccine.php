<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/controlVaccine.css">
    <title>Control de Vacunas</title>
</head>
<body>
<?php
session_start();
if(empty($_SESSION["User_id"])) {
    header("Location: index.php");
    exit;
}
require_once("../controller/vaccine.controller.php");
require_once("../conexion.php");

$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mascota_id = $_POST['mascota'];
    $vacuna_id = $_POST['vacuna'];
    $fecha = $_POST['fecha'];

    $conn = new Conexion();
    $connection = $conn->connect();
    $sql = "INSERT INTO ControlVacuna(Mascota_id, Vacuna_id, fecha)
    VALUES ('{$mascota_id}', '{$vacuna_id}', '{$fecha}')";

    $result = $connection->query($sql);

    if ($result) {
        $successMessage = "Vacuna registrada con éxito.";
    } else {
        $successMessage = "Error al registrar la vacuna.";
    }
}

require_once("../controller/mascota.controller.php");
$mascotaController = new MascotaController();
$mascotas = $mascotaController->read();

$vacunaController = new VaccineController();
$vacunas = $vacunaController->read();
?>
    <section class="main__vacunas">
        <div class="vacunas__title">
            <h2>Control de Vacunas</h2>
        </div>
        <?php if ($successMessage): ?>
            <p class="success-message"><?= $successMessage ?></p>
        <?php endif; ?>
        <form action="controlVaccine.php" method="POST">
            <label for="mascota">Mascota:</label>
            <select name="mascota" id="mascota">
                <?php foreach ($mascotas as $mascota): ?>
                    <option value="<?= $mascota->id ?>"><?= $mascota->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <label for="vacuna">Vacuna:</label>
            <select name="vacuna" id="vacuna">
                <?php foreach ($vacunas as $vacuna): ?>
                    <option value="<?= $vacuna->id ?>"><?= $vacuna->nombre ?></option>
                <?php endforeach; ?>
            </select>
            <label for="fecha">Fecha de vacunación:</label>
            <input type="date" id="fecha" name="fecha">
            <input type="submit" value="Registrar Vacuna">
        </form>
        <div class="down__buttons">
            <a href="controlVaccineRegistered.php">Ver Control Vacunas</a>
            <a href="../index.php">Inicio</a>
        </div>
    </section>
</body>
</html>