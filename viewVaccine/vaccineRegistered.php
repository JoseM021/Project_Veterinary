<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Vaccine</title>
</head>
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
                        <th><?= $vaccine->id ?></th>
                        <th><?= $vaccine->nombre ?></th>
                        <th class="buttonVacineUpdate"><a href="updateVaccine.php?id=<?= $vaccine->id ?>">Editar</a></th>
                        <th class="buttonVacineDelete"><a href="deleteVaccine.php?id=<?= $vaccine->id ?>">Eliminar</a></th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>
</html>
</html>