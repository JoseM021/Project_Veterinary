<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mascotas</title>
</head>
<body>
    <section class="main__mascotas">
        <div class="mascotas__tittle">
            <h2>Registro de mascotas</h2>
        </div>
        <table class="table__mascotas">
            <thead>
                <tr class="rowsHeaderMascotas">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo de mascota</th>
                    <th>Raza</th>
                    <th>Fecha de nacimiento</th>
                    <th>Dueño</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once(__DIR__ . "/../controller/mascota.controller.php");
                    require_once(__DIR__ . "/../controller/tipomascota.controller.php");
                    require_once(__DIR__ . "/../controller/raza.controller.php");
                    require_once(__DIR__ . "/../controller/user.controller.php"); // Asegúrate de tener este archivo y clase
                    require_once(__DIR__ . "/../conexion.php");

                    $mascotaController = new MascotaController();
                    $mascotas = $mascotaController->read();

                    $tipoMascotaController = new TipoMascotaController();
                    $tipoMascotas = $tipoMascotaController->read();

                    $razaController = new RazaController();
                    $razas = $razaController->read();

                    $userController = new User_Controller();
                    $users = $userController->read();
                    
                ?>
                <?php foreach ($mascotas as $mascota): ?>
                    <?php
                        $tipoMascotaNombre = "";
                        foreach ($tipoMascotas as $tipoMascota) {
                            if ($mascota->TipoMascota_id == $tipoMascota->id) {
                                $tipoMascotaNombre = $tipoMascota->nombre;
                                break;
                            }
                        }

                        $razaNombre = "";
                        foreach ($razas as $raza) {
                            if ($mascota->Raza_id == $raza->id) {
                                $razaNombre = $raza->nombre;
                                break;
                            }
                        }
                        $userName = "";
                        foreach ($users as $user) {
                            if ($mascota->User_id == $user->id) {
                                $userName = $user->username;
                                break;
                            }
                        }
                    ?>
                    <tr class="rowscontent__mascotas">
                        <form action="/../process/update_mascota.php" method="POST">
                            <th><?= $mascota->id ?><input type="hidden" name="id" value="<?= $mascota->id ?>"></th>
                            <th><input type="text" name="nombre" value="<?= $mascota->nombre ?>"></th>
                            <th><input type="text" name="tipoMascotaNombre" value="<?= $tipoMascotaNombre ?>"></th>
                            <th><input type="text" name="razaNombre" value="<?= $razaNombre ?>"></th>
                            <th><input type="text" name="FechaNacimiento" value="<?= $mascota->FechaNacimiento ?>"></th>
                            <th><?= $userName ?></th>
                            <th class="buttonMascotaUpdate"><input type="submit" value="Actualizar"></th>
                        </form>
                        <th class="buttonMascotaDelete">
                            <form action="/../process/delete_mascota.php" method="POST">
                                <input type="hidden" name="id" value="<?= $mascota->id ?>">
                                <input type="submit" value="Eliminar">
                            </form>
                        </th>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
        </table>
        <div class="mascotas__button">
            <a href="createMascota.php" class="buttonAddMascota">Agregar mascota</a>
        </div>
    </section>
</body>
</html>
