<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vaccineRegistered.css">
    <title>Vacunas Registradas</title>
</head>
<body>
    <section class="main__vaccines">
        <div class="vaccines__tittle">
            <h2>Vacunas Registradas</h2>
        </div>
        <table class="table__vaccines">
            <thead>
                <tr class="rowsHeaderVaccines">
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
                ?>
                <tr class="rowscontent__vaccines">
                  <form action="/../process/update_controlvaccine.php" method="POST">
                    <th><?= $controlVacuna->Vacuna_id ?><input type="hidden" name="Vacuna_id" value="<?= $controlVacuna->Vacuna_id ?>"></th>
                    <th><?= $vacunaActual->nombre ?></th>
                    <th><?= $mascotaActual->nombre ?></th>
                    <th><?= $controlVacuna->Mascota_id ?><input type="hidden" name="Mascota_id" value="<?= $mascotaActual->id ?>"></th>
                  </form>
                  <th class="buttonVacineDelete">
                    <form action="/../process/delete_controlvaccine.php" method="POST">
                        <input type="hidden" name="Mascota_id" value="<?= $controlVacuna->Mascota_id ?>">
                        <input type="hidden" name="Vacuna_id" value="<?= $controlVacuna->Vacuna_id ?>">
                        <input type="submit" value="Eliminar">
                    </form>
                  </th>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>