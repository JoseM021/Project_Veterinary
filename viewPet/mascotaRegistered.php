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
                        <th><?= $mascota->id ?></th>
                        <th><?= $mascota->nombre ?></th>
                        <th><?= $tipoMascotaNombre ?></th>
                        <th><?= $razaNombre ?></th>
                        <th><?= $mascota->FechaNacimiento ?></th>
                        <th><?= $userName ?></th>
                        <th class="buttonMascotaUpdate"><a href="updateMascota.php?id=<?= $mascota->id ?>">Editar</a></th>
                        <th class="buttonMascotaDelete"><a href="deleteMascota.php?id=<?= $mascota->id ?>">Eliminar</a></th>
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
