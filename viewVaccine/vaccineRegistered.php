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
                    <th>ID</th>
                    <th>Nombre de la Vacuna</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once(__DIR__ . "/../controller/vaccine.controller.php");
                    require_once(__DIR__ . "/../conexion.php");
                    $vaccineController = new VaccineController();
                    $vaccines = $vaccineController->read(); 
                ?>
                <?php foreach ($vaccines as $vaccine): ?>
                    <tr class="rowscontent__vaccines">
                        <form action="/../process/update_vaccine.php" method="POST">
                            <th><?= $vaccine->id ?><input type="hidden" name="id" value="<?= $vaccine->id ?>"></th>
                            <th><input type="text" name="nombre" value="<?= $vaccine->nombre ?>"></th>
                            <th class="buttonVacineUpdate"><input type="submit" value="Actualizar"></th>
                        </form>
                        <th class="buttonVacineDelete">
                            <form action="/../process/delete_vaccine.php" method="POST">
                                <input type="hidden" name="id" value="<?= $vaccine->id ?>">
                                <input type="submit" value="Eliminar">
                            </form>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>
</html>