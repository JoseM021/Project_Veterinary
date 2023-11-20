<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/control_vacunas.css">
  <title>Control Vacunas</title>
</head>
<body>

<section class="main__control_vacunas">
  <div class="control_vacunas__tittle">
    <h2>Control Vacunas</h2>
  </div>

  <table class="table__control_vacunas">
    <thead>
      <tr class="rowscontent__header">
        <th>ID-Vacuna</th>
        <th>Nombre Vacuna</th>
        <th>Nombre Mascota</th>
        <th>ID-Mascota</th>
      </tr>
    </thead>

    <tbody>
    <?php
    require_once("../conexion.php");
    require_once(__DIR__ . "/../controller/mascota.controller.php");
    require_once(__DIR__ . "/../controller/vaccine.controller.php");
    require_once(__DIR__ . "/../controller/controlvaccine.controller.php");

    $mascotaController = new MascotaController();
    $mascotas = $mascotaController->read();

    $vacunaController = new VaccineController();
    $vacunas = $vacunaController->read();

    $controlVacunaController = new ControlVaccineController();
    $controlVacunas = $controlVacunaController->read();

    foreach ($controlVacunas as $controlVacuna) {
    $mascotaEncontrada = false;
    $vacunaEncontrada = false;

    foreach ($mascotas as $mascota) {
        if ($mascota->id == $controlVacuna->Mascota_id) {
        $mascotaEncontrada = true;
        $mascotaActual = $mascota;
        break;
        }
    }

    if (!$mascotaEncontrada) {
        continue; 
    }

    foreach ($vacunas as $vacuna) {
        if ($vacuna->id == $controlVacuna->Vacuna_id) {
        $vacunaEncontrada = true;
        $vacunaActual = $vacuna;
        break;
        }
    }

    if (!$vacunaEncontrada) {
        continue;
    }

    echo "<tr class='rowscontent__control_vacunas'>";
    echo "<td>{$controlVacuna->Vacuna_id}</td>";
    echo "<td>{$vacunaActual->nombre}</td>";
    echo "<td>{$mascotaActual->nombre}</td>";
    echo "<td>{$mascotaActual->id}</td>";
    echo "<th>";
    echo "<form action='./process/delete_control_vacuna.php' method='post'>";
    echo "<input type='submit' value='Eliminar'>";
    echo "</form>";
    echo "</th>";
    echo "</tr>";
    }
    ?>

    </tbody>
  </table>
</section>

</body>
</html>

