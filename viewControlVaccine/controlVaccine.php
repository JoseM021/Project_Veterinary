<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Vacunas</title>
</head>
<body>
<?php
require_once("../controller/vaccine.controller.php");
require_once("../conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Este bloque de código se ejecuta cuando se envía el formulario de registro de vacunas
    $mascota_id = $_POST['mascota'];
    $vacuna_id = $_POST['vacuna'];
    $fecha = $_POST['fecha'];

    $conn = new Conexion();
    $connection = $conn->connect();
    $sql = "INSERT INTO ControlVacuna(Mascota_id, Vacuna_id, fecha)
    VALUES ('{$mascota_id}', '{$vacuna_id}', '{$fecha}')";

    $result = $connection->query($sql);

    if ($result) {
        echo "<p>Vacuna registrada con éxito.</p>";
    } else {
        echo "<p>Error al registrar la vacuna.</p>";
    }
} else {
    require_once("../controller/mascota.controller.php");
    $mascotaController = new MascotaController();
    $mascotas = $mascotaController->read();
}

$vacunaController = new VaccineController();
$vacunas = $vacunaController->read();
?>
    <section class="main__vacunas">
        <div class="vacunas__title">
            <h2>Control de Vacunas</h2>
        </div>
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
    </section>
</body>
</html>